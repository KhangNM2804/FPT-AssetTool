<?php

namespace App\Repositories;

use App\Models\AssetDetail;
use App\Models\Setting;

class SettingRepository
{
    protected $setting;

    public function __construct(Setting $setting, AssetDetail $assetDetail)
    {
        $this->setting = $setting;
        
    }
   
    public function update($key, $data)
    {
        $setting = $this->setting::where('key', $key)->first();
        $setting->value = $data;
        $setting->save();
    }
}
