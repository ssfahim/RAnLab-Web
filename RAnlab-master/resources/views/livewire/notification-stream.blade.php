<div class="userTopbarMenu">
    <button wire:click="updateNotifications">Update</button>
    <ul>
        <li>View All</li>
        @foreach ($recentNotifications as $notification)
            <li>{{$notification}}</li>
        @endforeach
    </ul>
</div>
