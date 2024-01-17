<?php

namespace App\Services;

use App\Repositories\AssetRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            while (Storage::exists('uploads/' . $hashedFilename)) {
                // File đã tồn tại, tăng biến đếm và thử lại
                $hashedFilename = hash('sha256', time() . '_' . $originalFilename . $counter) . '.' . $extension;
                $counter++;
            }
            $file->storeAs('uploads', $hashedFilename);
            $data['image'] = $hashedFilename;
        }
        $data['user_id'] = Auth::user()->id;
        $data['total_price']=$data['quantity']*$data['price'];
        return $this->assetRepository->create($data);
    }
    public function findAssetService($id)
    {
        return $this->assetRepository->find($id);
    }
    public function updateAssetService($data, $id)
    {
        if (array_key_exists('quantity', $data)) {
            unset($data['quantity']);
        }
        return $this->assetRepository->update($data, $id);
    }
}
