<x-guest-layout>
    <form method="POST" action="{{ route('schedule.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="class_type_id" value="" />
            <select name="class_type_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option>Select Option</option>
                @foreach($classTypes as $classType)
                    <option value="{{$classType->id}}" >{{$classType->name}}</option>
                @endforeach
            </select>
        </div>

        <!-- date -->
        <div class="mt-4">
            <x-input-label for="date" :value="__('date')" />
            <x-text-input id="date" class="block mt-1 w-full border-gray-300 focus:border-gray-500" min="{{date('Y-m-d',strtotime('tomorrow'))}}"  type="date" name="date"  required autocomplete="username" />
        </div>
        <!-- time -->
        <div class="mt-4">
            <x-input-label for="time" :value="__('time')" />
            <!-- time
            <select type="time" name="time" class="block mt-2 w-full border-gray-300 focus:ring-0 focus:borde-gray-700">
                <option value="05:00:00">5 am</option>
                <option value="07:00:00">7 am</option>
                <option value="08:00:00">8 am</option>
                <option value="09:00:00">9 am</option>
                <option value="10:00:00">10 am</option>
                <option value="11:00:00">11 am</option>
                <option value="12:00:00">12 am</option>
                <option value="13:00:00">1 pm</option>
                <option value="14:00:00">2 pm</option>
                <option value="15:00:00">3 pm</option>
                <option value="16:00:00">4 pm</option>
                <option value="17:00:00">5 pm</option>
                <option value="18:00:00">6 pm</option>
                <option value="19:00:00">7 pm</option>
                <option value="20:00:00">8 am</option>
            </select>
            -->
            <x-text-input id="time" class="block mt-1 w-full border-gray-300 focus:border-gray-500" min="{{date('Y-m-d',strtotime('tomorrow'))}}"  type="time" name="time"  required autocomplete="username" />
        </div>
        <div  class="flex items-center justify-end mt-4">
            <x-primary-button type="submit"  class="ms-4">
                visit
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
