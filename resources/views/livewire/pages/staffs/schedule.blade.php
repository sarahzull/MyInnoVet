@section('title', $title)
@section('breadcrumb', $breadcrumb)

<div>
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-between mb-4">
                <div class="col text-start">
                    <a class="text-sm" href="{{ route('staffs.index') }}">
                    {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
                    </a>
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>

            <form wire:submit.prevent="submit">
                @if(auth()->check() && auth()->user()->getRoleNames()->first() === 'Veterinarian')
                    
                @else
                    <div class="mb-6">
                        <div class="row">
                            <label class="col-lg-4 col-form-label fw-semibold fs-5">{{ $nameForm }}:</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="date" id="name" class="form-control form-control-solid ps-12" name="name" wire:model="name" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mb-6">
                    <div class="">
                        <label class="col-lg-4 col-form-label fw-semibold fs-5">{{ $schedule }}:</label>
                        <div class="col-lg-12">
                            <table class="table align-middle">
                                <thead class="">
                                    <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase bg-light">
                                        <th scope="col">DAY</th>
                                        <th scope="col">TIME</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($days as $day)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="{{ $day->id }}" name="day" value="{{ $day->id }}" wire:model="checkedDays">
                                                    <label class="form-check-label" for="{{ $day->id }}">
                                                        {{ $day->short_name }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <select class="form-select" id="tartTime_{{ $day->id }}" name="startTime" wire:model="startTime.{{ $day->id }}">
                                                        <option selected>-- Please select start time --</option>
                                                        @foreach ($times as $time)
                                                            <option value="{{ $time->id }}">{{ $time->description }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="flex-grow-1 d-flex align-items-center justify-content-center px-8"> TO </span>
                                                    <select class="form-select" id="endTime_{{ $day->id }}" name="endTime" wire:model="endTime.{{ $day->id }}">
                                                        <option selected>-- Please select end time --</option>
                                                        @foreach ($times as $time)
                                                            <option value="{{ $time->id }}">{{ $time->description }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('staffs.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
