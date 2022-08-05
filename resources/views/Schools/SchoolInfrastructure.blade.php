@extends('Components.SchoolLayout')
@section('title','School Infrastructure Profile')
@section('admin_content')

<div class="dashboard-title fl-wrap">
    <!-- Register content-->
    <div class="col-md-12">
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="RegistrationForm">
                <form class="SchoolInfrastructureForm">
                    @csrf
                    <input type="hidden" name="school_id" value="{{$data[0]->school_id  ?? ''}}">
                    @if(count($data) > 0)
                    <div class="custom-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Total Class Rooms <small class="text-primary">*</small> <i
                                        class="fal fa-user"></i></label>
                                <input type="text" class="required" placeholder="Total Class Rooms"
                                    name="total_class_rooms" id="total_class_rooms"
                                    value="{{$data[0]->total_class_rooms ?? ''}}" />
                            </div>
                            <div class="col-sm-6">
                                <label>Building Type <small class="text-primary">*</small></label>
                                <div class="listsearch-input-item">
                                    <select name="building_type" id="building_type"
                                        class="chosen-select no-search-select required">
                                        <option>Owned</option>
                                        <option>Rented</option>
                                        <option>Lease</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Library</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="library" value="ignore"
                                            {{$data[0]->library  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="library" value="yes"
                                            {{$data[0]->library  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="library" value="no"
                                            {{$data[0]->library  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Computer Lab</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="computer_lab" value="ignore"
                                            {{$data[0]->computer_lab  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="computer_lab" value="yes"
                                            {{$data[0]->computer_lab  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="computer_lab" value="no"
                                            {{$data[0]->computer_lab  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Science Lab</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="science_lab" value="ignore"
                                            {{$data[0]->science_lab  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="science_lab" value="yes"
                                            {{$data[0]->science_lab  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="science_lab" value="no"
                                            {{$data[0]->science_lab  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Play Ground</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="play_ground" value="ignore"
                                            {{$data[0]->play_ground  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="play_ground" value="yes"
                                            {{$data[0]->play_ground  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="play_ground" value="no"
                                            {{$data[0]->play_ground  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Girls Toilet</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="girls_toilet" value="ignore"
                                            {{$data[0]->girls_toilet  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="girls_toilet" value="yes"
                                            {{$data[0]->girls_toilet  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="girls_toilet" value="no"
                                            {{$data[0]->girls_toilet  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Boys Toilet</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="boys_toilet" value="ignore"
                                            {{$data[0]->boys_toilet  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="boys_toilet" value="yes"
                                            {{$data[0]->boys_toilet  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="boys_toilet" value="no"
                                            {{$data[0]->boys_toilet  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Drinking Water</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="drinking_water" value="ignore"
                                            {{$data[0]->drinking_water  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="drinking_water" value="yes"
                                            {{$data[0]->drinking_water  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="drinking_water" value="no"
                                            {{$data[0]->drinking_water  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Smart Class</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="smart_class" value="ignore"
                                            {{$data[0]->smart_class  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="smart_class" value="yes"
                                            {{$data[0]->smart_class  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="smart_class" value="no"
                                            {{$data[0]->smart_class  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Disable Friendly</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="disable_friendly" value="ignore"
                                            {{$data[0]->smart_class  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="disable_friendly" value="yes"
                                            {{$data[0]->smart_class  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="disable_friendly" value="no"
                                            {{$data[0]->smart_class  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Mealt</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="mealt" value="ignore"
                                            {{$data[0]->mealt  == "ignore" ? 'checked' : ''}}>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="mealt" value="yes"
                                            {{$data[0]->mealt  == "yes" ? 'checked' : ''}}>
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="mealt" value="no"
                                            {{$data[0]->mealt  == "no" ? 'checked' : ''}}>
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text">
                            <br>
                            <div id="error"></div>
                        </div>
                        <button type="button" class="register-btn btn color2-bg float-btn"
                            onclick="InfraStructureStore()">Update<i class="fal fa-user-plus"></i></button>

                    </div>
                    @else
                    <div class="custom-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Total Class Rooms <small class="text-primary">*</small> <i
                                        class="fal fa-user"></i></label>
                                <input type="text" class="required" placeholder="Total Class Rooms"
                                    name="total_class_rooms" id="total_class_rooms" />
                            </div>
                            <div class="col-sm-6">
                                <label>Building Type <small class="text-primary">*</small></label>
                                <div class="listsearch-input-item">
                                    <select name="building_type" id="building_type"
                                        class="chosen-select no-search-select required">
                                        <option>Owned</option>
                                        <option>Rented</option>
                                        <option>Lease</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Library</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="library" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="library" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="library" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Computer Lab</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="computer_lab" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="computer_lab" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="computer_lab" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Science Lab</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="science_lab" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="science_lab" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="science_lab" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Play Ground</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="play_ground" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="play_ground" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="play_ground" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Girls Toilet</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="girls_toilet" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="girls_toilet" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="girls_toilet" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Boys Toilet</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="boys_toilet" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="boys_toilet" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="boys_toilet" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Drinking Water</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="drinking_water" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="drinking_water" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="drinking_water" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Smart Class</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="smart_class" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="smart_class" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="smart_class" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Disable Friendly</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="disable_friendly" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="disable_friendly" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="disable_friendly" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <label>Mealt</label>
                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                    <li>
                                        <input type="radio" name="mealt" value="ignore" checked>
                                        <label for="check-aaa5">Ignore</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="mealt" value="yes">
                                        <label for="check-bb5">Yes</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="mealt" value="no">
                                        <label for="check-dd5">No</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text">
                            <br>
                            <div id="error"></div>
                        </div>
                        <button type="button" class="register-btn btn color2-bg float-btn"
                            onclick="InfraStructureStore()">Update<i class="fal fa-user-plus"></i></button>

                    </div>
                    @endif
                </form>

            </div>
        </div>
    </div>
    <!-- Register content end-->
</div>


<!-- === Script === -->
<script>
function InfraStructureStore() {

    var fields = $("input[class*='required']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', '');
            $("#error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#error").hide().removeClass().html('');
        }
    }


    $.ajax({
        type: "POST",
        url: "{{route('InfrastructureUpdate')}}",
        data: $(".SchoolInfrastructureForm").serialize(),
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").prop('disabled', false)
            if (data['success'] == true) {
                $("#error").show().addClass('alert alert-success').html(data['message']);
                location.reload();
            } else if (data['validate'] == true) {
                $("#error").show().addClass('alert alert-danger').html(data['message'][0]);
            } else {
                $("#error").show().addClass('alert alert-danger').html(data['message']);
            }
        }
    })
}
</script>
<!-- === Script === -->
@endsection