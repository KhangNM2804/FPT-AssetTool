<?php

namespace App\Providers;

use App\Models\Asset;
use App\Models\AssetDetail;
use App\Models\CategoryAsset;
use App\Models\CategoryRoom;
use App\Models\GroupAsset;
use App\Models\Handover;
use App\Models\Room;
use App\Models\Semester;
use App\Policies\AssetDetailPolicy;
use App\Policies\AssetPolicy;
use App\Policies\BorrowPolicy;
use App\Policies\CategoryAssetPolicy;
use App\Policies\CategoryRoomPolicy;
use App\Policies\GroupAssetPolicy;
use App\Policies\HandoverPolicy;
use App\Policies\RoomPolicy;
use App\Policies\SemesterPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Asset::class => AssetPolicy::class,
        AssetDetail::class => AssetDetailPolicy::class,
        BorrowPolicy::class => BorrowPolicy::class,
        CategoryAsset::class => CategoryAssetPolicy::class,
        CategoryRoom::class => CategoryRoomPolicy::class,
        GroupAsset::class => GroupAssetPolicy::class,
        Handover::class => HandoverPolicy::class,
        Room::class => RoomPolicy::class,
        Semester::class => SemesterPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });
        //
    }
}
