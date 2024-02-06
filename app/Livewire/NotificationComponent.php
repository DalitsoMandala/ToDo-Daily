<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\TaskCategory;
use App\Notifications\TodoOverdue;
use Illuminate\Support\Facades\DB;

class NotificationComponent extends Component
{
    public $user;


    public function readAll()
    {
        $user = auth()->user();
        $user->unreadNotifications->markAsRead();
    }

    public function render()
    {


        // Calculate tomorrow's date
        $tomorrow = Carbon::now()->addDay();

        // Query the database for records where expiration_date is tomorrow
        $expiringCategories = TaskCategory::whereDate('due_date', $tomorrow->toDateString())->get();
        $temp = [];
        $tempIds = [];

        if (count($expiringCategories) > 0) {
            foreach ($expiringCategories as $category) {
                if (!$category->is_notified) {
                    $temp[] = $category->name;
                    $tempIds[] = $category->id;
                }
            }

            if (!empty($temp)) {


                auth()->user()->notify(new TodoOverdue($temp));
                TaskCategory::whereIn('id', $tempIds)->update(['is_notified' => true]);
            }
        }


        $user = auth()->user();

        // Retrieve all unread notifications for the user
        $unreadNotifications = $user->unreadNotifications;


        return view('livewire.notification-component', [
            'filteredNotifications' => $unreadNotifications,
            'unreadCount' => $unreadNotifications->count()
        ]);
    }
}
