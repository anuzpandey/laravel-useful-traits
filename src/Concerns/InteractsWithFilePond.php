<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use Exception;
use Illuminate\Support\Facades\Storage;
use JsonException;

trait InteractsWithFilePond
{
    /**
     * @throws JsonException
     */
    public function uploadFilePondRequestFiles(array|object $request, string $key, $model): void
    {
        try {
            if (is_array($request[$key])) {
                foreach ($request[$key] as $fileData) {
                    $this->extracted($fileData, $model, $key);
                }
            } elseif ($request[$key] !== null) {
                $this->extracted($request[$key], $model, $key);
            }
        } catch (Exception $e) {
            throw new JsonException($e->getMessage());
        }
    }

    /**
     * @throws JsonException
     */
    private function extracted(mixed $fileData, $model, string $key): void
    {
        $fileData = json_decode($fileData, true, 512, JSON_THROW_ON_ERROR);

        $model->addMedia(
            storage_path('app/uploads/files/tmp/'.$fileData['folder'].'/'.$fileData['file_name'])
        )->toMediaCollection($key);

        // Remove Temporary file after upload
        Storage::deleteDirectory('uploads/files/tmp/'.$fileData['folder']);
    }
}
