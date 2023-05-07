<?php

namespace StoreWays\Laravel\RewardPoints;

use StoreWays\Laravel\RewardPoints\Models\RewardPoint;

class PointsManager
{
    public function get()
    {
        $points = RewardPoint::with(['rewardable'])->get();

        return $points;
    }
}
