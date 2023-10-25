<?php

namespace App\Http\Services;
use App\Models\AvailableDate;

class AvailableDatesService{

    public function insertAvailableDatesAccordingToOpeningAndClosingHour($restaurant_id, $opening_hour, $closing_hour): void {
        list($hourOpening) = explode(':', $opening_hour);
        $hourAsIntOpening = (int)$hourOpening;
    
        list($hourClosing) = explode(':', $closing_hour);
        $hourAsIntClosing = (int)$hourClosing;
    
        $result = [];
    
        if ($hourAsIntOpening <= $hourAsIntClosing) {
            for ($i = $hourAsIntOpening; $i <= $hourAsIntClosing; $i++) {
                $result[] = $i;
            }
        } else {
            for ($i = $hourAsIntOpening; $i <= 23; $i++) {
                $result[] = $i;
            }
            for ($i = 0; $i <= $hourAsIntClosing; $i++) {
                $result[] = $i;
            }
        }
    
        for ($i = 0; $i < 7; $i++) {
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    
            for ($j = 0; $j < count($result) - 1; $j++) {
                $hour_start_formatted = date('H:i', strtotime("{$result[$j]}:00"));
                
                if ($result[$j] > $result[$j + 1]) {
                    $hour_end_formatted = date('H:i', strtotime("00:00"));
                } else {
                    $hour_end_formatted = date('H:i', strtotime("{$result[$j+1]}:00"));
                }
    
                AvailableDate::create([
                    'restaurant_id' => $restaurant_id,
                    'day' => $days[$i],
                    'hour_start' => $hour_start_formatted,
                    'hour_end' => $hour_end_formatted,
                    'isFull' => false,
                ]);
            }
        }
    }
}

?>