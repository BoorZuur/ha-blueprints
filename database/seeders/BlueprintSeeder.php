<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlueprintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blueprints = [
            [
                'user_id' => 1,
                'name' => 'Frigate Notifications',
                'description' => 'This blueprint will send a notification to your device when a Frigate event for the selected camera is fired. The notification will initially include the thumbnail of the detection, but include an actionable notification allowing you to view the clip and snapshot.',
                'url' => 'https://github.com/SgtBatten/HA_blueprints/blob/main/Frigate_Camera_Notifications/Stable.yaml',
                'blueprint' => 'smart_light.yaml',
                'category_id' => 1,
                'show' => true,
            ],
            [
                'user_id' => 2,
                'name' => 'Motion Sensor',
                'description' => 'A blueprint for a motion sensor setup.',
                'url' => 'https://example.com/motion-sensor',
                'blueprint' => 'motion_sensor.yaml',
                'category_id' => 2,
                'show' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Smart Doorbell',
                'description' => 'A blueprint for a smart doorbell system.',
                'blueprint' => 'smart_doorbell.yaml',
                'category_id' => 3,
                'show' => true,
            ],
        ];

        foreach ($blueprints as $blueprint) {
            \App\Models\Blueprint::create($blueprint);
        }
    }
}
