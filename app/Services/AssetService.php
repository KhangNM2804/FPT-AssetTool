<?php

namespace App\Services;

use App\Repositories\AssetRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AssetService
{
    protected $assetRepository;
    public function __construct(AssetRepository $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }
    public function datatablesService()
    {
        return $this->assetRepository->datatables();
    }
    public function createAssetService($data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $file = $data['image'];
            $originalFilename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $hashedFilename = hash('sha256', time() . '_' . $originalFilename) . '.' . $extension;
            $counter = 1;

            while (Storage::exists('public/uploads/' . $hashedFilename)) {
                // File already exists, increment the counter and try again
                $hashedFilename = hash('sha256', time() . '_' . $originalFilename . $counter) . '.' . $extension;
                $counter++;
            }

            // Resize and store the image
            $image = Image::make($file)->resize(300, 300)->save(storage_path('app/public/uploads/' . $hashedFilename));

            $data['image'] = $hashedFilename;
        }

        $data['user_id'] = Auth::user()->id;
        $data['price'] = intval(str_replace(',', '', $data['price']));
        $data['total_price'] = $data['quantity'] * $data['price'];
        return $this->assetRepository->create($data);
    }
    public function findAssetService($id)
    {
        return $this->assetRepository->find($id);
    }
    public function updateAssetService($data, $id)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $file = $data['image'];
            $originalFilename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $hashedFilename = hash('sha256', time() . '_' . $originalFilename) . '.' . $extension;
            $counter = 1;

            while (Storage::exists('public/uploads/' . $hashedFilename)) {
                // File already exists, increment the counter and try again
                $hashedFilename = hash('sha256', time() . '_' . $originalFilename . $counter) . '.' . $extension;
                $counter++;
            }
            // Resize and store the image
            $image = Image::make($file)->resize(300, 300)->save(storage_path('app/public/uploads/' . $hashedFilename));

            $data['image'] = $hashedFilename;
        }

        $data['user_id'] = Auth::user()->id;
        
        if (array_key_exists('quantity', $data)) {
            unset($data['quantity']);
        }
        $data['price'] = intval(str_replace(',', '', $data['price']));

        return $this->assetRepository->update($data, $id);
    }
}
