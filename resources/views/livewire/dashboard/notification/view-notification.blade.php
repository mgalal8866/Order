@push('csslive')
<link rel="stylesheet" type="text/css" href={{asset('asset/vendors/css/forms/select/select2.min.css')}}>

@endpush
<div>
    <form id="notifi" wire:submit.prevent="sendnotificion">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('tran.notifiction') }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column">
                        <label class="form-check-label mb-50" for="scales">مخصص / {{ __('tran.sendall') }} </label>
                        <div class="form-check form-switch form-check-success">
                            <input type="checkbox" class="form-check-input" wire:model='selectactive' id="scales"
                                {{ $selectactive == 1 ? 'checked' : '' }} />
                            <label class="form-check-label" for="scales">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                    @if ($selectactive == 0)
                        <div class="col-md-6 mb-1" data-select2-id="111">
                            <label>Multiple</label>
                            <div class="position-relative" data-select2-id="110"><select
                                    class="select2 form-control select2-hidden-accessible" multiple=""
                                    data-select2-id="7" tabindex="-1" aria-hidden="true">
                                    <optgroup label="Alaskan/Hawaiian Time Zone" data-select2-id="112">
                                        <option value="AK" data-select2-id="113">Alaska</option>
                                        <option value="HI" data-select2-id="114">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone" data-select2-id="115">
                                        <option value="CA" data-select2-id="116">California</option>
                                        <option value="NV" data-select2-id="117">Nevada</option>
                                        <option value="OR" data-select2-id="118">Oregon</option>
                                        <option value="WA" data-select2-id="119">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone" data-select2-id="120">
                                        <option value="AZ" data-select2-id="121">Arizona</option>
                                        <option value="CO" selected="" data-select2-id="9">Colorado</option>
                                        <option value="ID" data-select2-id="122">Idaho</option>
                                        <option value="MT" data-select2-id="123">Montana</option>
                                        <option value="NE" data-select2-id="124">Nebraska</option>
                                        <option value="NM" data-select2-id="125">New Mexico</option>
                                        <option value="ND" data-select2-id="126">North Dakota</option>
                                        <option value="UT" data-select2-id="127">Utah</option>
                                        <option value="WY" data-select2-id="128">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone" data-select2-id="129">
                                        <option value="AL" data-select2-id="130">Alabama</option>
                                        <option value="AR" data-select2-id="131">Arkansas</option>
                                        <option value="MO" data-select2-id="139">Missouri</option>
                                        <option value="OK" data-select2-id="140">Oklahoma</option>
                                        <option value="SD" data-select2-id="141">South Dakota</option>
                                        <option value="TX" data-select2-id="142">Texas</option>
                                        <option value="TN" data-select2-id="143">Tennessee</option>
                                        <option value="WI" data-select2-id="144">Wisconsin</option>
                                    </optgroup>
                                    <optgroup label="Eastern Time Zone" data-select2-id="145">
                                        <option value="CT" data-select2-id="146">Connecticut</option>
                                        <option value="DE" data-select2-id="147">Delaware</option>
                                        <option value="FL" selected="" data-select2-id="10">Florida</option>
                                        <option value="GA" data-select2-id="148">Georgia</option>
                                        <option value="IN" data-select2-id="149">Indiana</option>
                                        <option value="ME" data-select2-id="150">Maine</option>
                                        <option value="MD" data-select2-id="151">Maryland</option>
                                        <option value="MA" data-select2-id="152">Massachusetts</option>
                                        <option value="MI" data-select2-id="153">Michigan</option>
                                        <option value="NH" data-select2-id="154">New Hampshire</option>
                                        <option value="NJ" data-select2-id="155">New Jersey</option>
                                        <option value="NY" data-select2-id="156">New York</option>
                                        <option value="NC" data-select2-id="157">North Carolina</option>
                                        <option value="OH" data-select2-id="158">Ohio</option>
                                        <option value="PA" data-select2-id="159">Pennsylvania</option>
                                        <option value="RI" data-select2-id="160">Rhode Island</option>
                                        <option value="SC" data-select2-id="161">South Carolina</option>
                                        <option value="VT" data-select2-id="162">Vermont</option>
                                        <option value="VA" data-select2-id="163">Virginia</option>
                                        <option value="WV" data-select2-id="164">West Virginia</option>
                                    </optgroup>
                                </select><span
                                    class="select2 select2-container select2-container--default select2-container--focus select2-container--open select2-container--above"
                                    dir="ltr" data-select2-id="8" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--multiple"
                                            role="combobox" aria-haspopup="true" aria-expanded="true" tabindex="-1"
                                            aria-disabled="false" aria-owns="select2-042y-results"
                                            aria-activedescendant="select2-042y-result-y3cc-CO">
                                            <ul class="select2-selection__rendered">
                                                <li class="select2-selection__choice" title="Colorado"
                                                    data-select2-id="11"><span
                                                        class="select2-selection__choice__remove"
                                                        role="presentation">×</span>Colorado</li>
                                                <li class="select2-selection__choice" title="Florida"
                                                    data-select2-id="12"><span
                                                        class="select2-selection__choice__remove"
                                                        role="presentation">×</span>Florida</li>
                                                <li class="select2-search select2-search--inline"><input
                                                        class="select2-search__field" type="search" tabindex="0"
                                                        autocomplete="off" autocorrect="off" autocapitalize="none"
                                                        spellcheck="false" role="searchbox" aria-autocomplete="list"
                                                        placeholder="" style="width: 0.75em;"
                                                        aria-controls="select2-042y-results"
                                                        aria-activedescendant="select2-042y-result-y3cc-CO"></li>
                                            </ul>
                                        </span></span><span class="dropdown-wrapper"
                                        aria-hidden="true"></span></span><span
                                    class="select2-container select2-container--default select2-container--open"
                                    style="position: absolute; top: -201px; left: 0px;"><span
                                        class="select2-dropdown select2-dropdown--above" dir="ltr"
                                        style="width: auto; min-width: 376.406px; position: relative;"><span
                                            class="select2-results">
                                            <ul class="select2-results__options" role="listbox"
                                                aria-multiselectable="true" id="select2-042y-results"
                                                aria-expanded="true" aria-hidden="false">
                                                <li class="select2-results__option" role="group"
                                                    aria-label="Alaskan/Hawaiian Time Zone" data-select2-id="199">
                                                    <strong class="select2-results__group">Alaskan/Hawaiian Time
                                                        Zone</strong>
                                                    <ul
                                                        class="select2-results__options select2-results__options--nested">
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-vs9w-AK" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-vs9w-AK">Alaska</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-tkbm-HI" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-tkbm-HI">Hawaii</li>
                                                    </ul>
                                                </li>
                                                <li class="select2-results__option" role="group"
                                                    aria-label="Pacific Time Zone" data-select2-id="200"><strong
                                                        class="select2-results__group">Pacific Time Zone</strong>
                                                    <ul
                                                        class="select2-results__options select2-results__options--nested">
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-p59h-CA" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-p59h-CA">California
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-e0po-NV" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-e0po-NV">Nevada</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-qmr6-OR" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-qmr6-OR">Oregon</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-9unm-WA" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-9unm-WA">Washington
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="select2-results__option" role="group"
                                                    aria-label="Mountain Time Zone" data-select2-id="201"><strong
                                                        class="select2-results__group">Mountain Time Zone</strong>
                                                    <ul
                                                        class="select2-results__options select2-results__options--nested">
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-fkes-AZ" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-fkes-AZ">Arizona</li>
                                                        <li class="select2-results__option select2-results__option--highlighted"
                                                            id="select2-042y-result-y3cc-CO" role="option"
                                                            aria-selected="true"
                                                            data-select2-id="select2-042y-result-y3cc-CO">Colorado</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-y3lh-ID" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-y3lh-ID">Idaho</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-4926-MT" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-4926-MT">Montana</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-98h4-NE" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-98h4-NE">Nebraska</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-s2re-NM" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-s2re-NM">New Mexico
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-7msg-ND" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-7msg-ND">North Dakota
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-pk1p-UT" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-pk1p-UT">Utah</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-kxt3-WY" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-kxt3-WY">Wyoming</li>
                                                    </ul>
                                                </li>
                                                <li class="select2-results__option" role="group"
                                                    aria-label="Central Time Zone" data-select2-id="202"><strong
                                                        class="select2-results__group">Central Time Zone</strong>
                                                    <ul
                                                        class="select2-results__options select2-results__options--nested">
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-0qu5-AL" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-0qu5-AL">Alabama</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-ztsy-AR" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-ztsy-AR">Arkansas</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-89sk-IL" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-89sk-IL">Illinois</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-ikb0-IA" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-ikb0-IA">Iowa</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-ypph-KS" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-ypph-KS">Kansas</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-0pm4-KY" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-0pm4-KY">Kentucky</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-9dy7-LA" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-9dy7-LA">Louisiana
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-wy9c-MN" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-wy9c-MN">Minnesota
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-jzuq-MS" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-jzuq-MS">Mississippi
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-afmi-MO" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-afmi-MO">Missouri</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-x9oi-OK" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-x9oi-OK">Oklahoma</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-xop4-SD" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-xop4-SD">South Dakota
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-nqei-TX" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-nqei-TX">Texas</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-vthj-TN" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-vthj-TN">Tennessee
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-a6il-WI" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-a6il-WI">Wisconsin
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="select2-results__option" role="group"
                                                    aria-label="Eastern Time Zone" data-select2-id="203"><strong
                                                        class="select2-results__group">Eastern Time Zone</strong>
                                                    <ul
                                                        class="select2-results__options select2-results__options--nested">
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-1i92-CT" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-1i92-CT">Connecticut
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-ra6o-DE" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-ra6o-DE">Delaware</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-xekf-FL" role="option"
                                                            aria-selected="true"
                                                            data-select2-id="select2-042y-result-xekf-FL">Florida</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-8ogn-GA" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-8ogn-GA">Georgia</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-0c8c-IN" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-0c8c-IN">Indiana</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-dqrd-ME" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-dqrd-ME">Maine</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-qgzl-MD" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-qgzl-MD">Maryland</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-edtu-MA" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-edtu-MA">Massachusetts
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-7dda-MI" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-7dda-MI">Michigan</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-0rgl-NH" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-0rgl-NH">New Hampshire
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-q2j8-NJ" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-q2j8-NJ">New Jersey
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-tbvp-NY" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-tbvp-NY">New York</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-94yb-NC" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-94yb-NC">North
                                                            Carolina</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-ce28-OH" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-ce28-OH">Ohio</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-l0zg-PA" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-l0zg-PA">Pennsylvania
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-bpds-RI" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-bpds-RI">Rhode Island
                                                        </li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-8g0w-SC" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-8g0w-SC">South
                                                            Carolina</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-um80-VT" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-um80-VT">Vermont</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-u9p7-VA" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-u9p7-VA">Virginia</li>
                                                        <li class="select2-results__option"
                                                            id="select2-042y-result-8tsi-WV" role="option"
                                                            aria-selected="false"
                                                            data-select2-id="select2-042y-result-8tsi-WV">West Virginia
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </span></span></span></div>
                        </div>
                    @endif
                    <div   class="col-12 col-md-6 ">
                        <label class="form-label" for="first-name-icon">{{__('tran.customer')}}</label>
                        <div wire:ignore class=" d-flex " style="flex-warp:nwrap !important">
                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                            <select class="select2 form-select" id="select2" >
                                <option value="">Walk-In Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->uuid }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-primary waves-effect" data-bs-target="#newcustomer"  data-bs-toggle="modal" id="button-addon2" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></button>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="title" label="{{ __('tran.title') }}" />
                        <input type="text" wire:model.defer='title' id="title" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="body" label="{{ __('tran.body') }}" />
                        <input type="text" wire:model.defer='body' id="body" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex  mt-2">
                            <x-imageupload wire:model.defer="image" :width="300" :height="150"
                                :imagenew="$image" :imageold="$image ?? asset('asset/images/noimage.jpg')" />
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.send') }}</button>
                </div>

            </div>
        </div>
    </form>
</div>
@push('jslive')
<script>
    window.addEventListener('swal', event=> {

      Swal.fire({
        title: event.detail.message,
        icon: 'info',
        customClass: {
          confirmButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
    })

  var select = $('.select2');
    $(document).on('click', '.add-new-customer', function () {
        select.select2('close');
    });

  select.on('select2:open', function () {
      if (!$(document).find('.add-new-customer').length) {
        $(document)
          .find('.select2-results__options')
          .before(
            '<div class="add-new-customer btn btn-flat-success cursor-pointer rounded-0 text-start mb-50 p-50 w-100" data-bs-toggle="modal" data-bs-target="#newcustomer">' +
              feather.icons['plus'].toSvg({ class: 'font-medium-1 me-50' }) +
              '<span class="align-middle">Add New Customer</span></div>'
          );
      }
    });
  select.each(function() {
        var $this = $(this)
        $this.wrap('<div style="width: 100%;" class="position-relative"></div>');
        // $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            // the following code is used to disable x-scrollbar when click in select input and
            // take 100% width in responsive also
            dropdownAutoWidth: true,
            width: '100%',
            dropdownParent: $this.parent()
        });
        $('#select2').on('change', function (e) {
                var data = $('#select2').select2("val");
            @this.set('selected', data);
        });
    });
</script>
<script src={{asset('asset/vendors/js/forms/select/select2.full.min.js')}}></script>
@endpush
