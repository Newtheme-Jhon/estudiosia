<?php

namespace App\Livewire\Instructor\Courses;

use Aws\CloudFront\CloudFrontClient;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

/**
 * reproductor: https://plyr.io/
 */

class PromotionalVideo extends Component
{
    use WithFileUploads;

    public $course;
    #[Validate('required', 'mimeTypes:video/*')]
    public $video;

    /**
     * Si lo queremos almacenar en el disco publico sera asi:
     * $this->course->video_path = $this->video->store('courses/promotional-videos');
     * $this->course->save();
     * return redirect()->route('instructor.courses.video', $this->course);
     * 
     * si queremos almacenarlo en s3 dentro de nuestro buket:
     * objeto a guardar: $file = $this->video;
     * ruta  para guardar video en s3, courses/id del curso: 
     * $route = $this->video->store(Storage::disk('s3')->put('courses/' . $this->course->id , $file));
     * $this->course->video_path = $route;
     * $this->course->save();
     * 
     * si queremos que al subir un video no se recargue la pagina, se hace un ajax automaticamente:
     * return $this->redirectRoute('instructor.courses.video', $this->course, true, true);
     * 
     * Para poder borrar el video anterior se debe pasar la ruta que almacenamos:
     * Storage::disk('s3')->delete($this->course->video_path);
     * 
     * Para obtener todos los archivos de un directorio de s3:
     * $objects = Storage::disk('s3')->allFiles('courses/' . $this->course->id . '/promotional-video');
     * dd($objects);
     * 
     */
    public function save()
    {
        $this->validate();

        if($this->course->video_path){
            Storage::disk('s3')->delete($this->course->video_path);

            // Creo un cliente de CloudFront
            $cloudfront = new CloudFrontClient([
                'version' => 'latest',
                'region' => 'us-east-1' // Reemplaza con tu región
            ]);

            // Invalido los objetos en CloudFront
            $result = $cloudfront->createInvalidation([
                'DistributionId' => env('AWS_CLOUDFRONT_DISTRIBUTION_ID'), // Reemplaza con tu ID de distribución
                'InvalidationBatch' => [
                    'CallerReference' => uniqid(),
                    'Paths' => [
                        'Items' => [
                            '/' . $this->course->video_path,
                        ],
                        'Quantity' => 1,
                    ],
                ],
            ]);
        }

        //objeto a guardar
        $file = $this->video;
        $route = Storage::disk('s3')->put('courses/' . $this->course->id . '/promotional-video' , $file);
        $this->course->video_path = $route;
        $this->course->save();

        //Eliminar archivo temporal
        if (file_exists($file->getRealPath())) {
            unlink($file->getRealPath());
        }

        return $this->redirectRoute('instructor.courses.video', $this->course, true, true);
    }

    public function render()
    {
        return view('livewire.instructor.courses.promotional-video');
    }
}
