@extends('layouts.admin')

@section('content')

    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">


    <div class="school-margin">
        <div class="school-header">
            <h1>{{ isset($school) ? 'Update School Info' : 'Add School Info'}} </h1>
        </div>


        <div class="add-school-form">
            <form action="{{isset($school) ? route('admin.school.update',$school->id) : route('admin.school.store')}} " method="POST">
                @csrf 
                @if(isset($school))
                    @method('PUT')
                @endif

                <div class="school-row">
                    <div class="school-col">
                        <label for="name">School Name</label>
                        <input type="text" name="school_name" id="name" value="{{old('school_name', $school->school_name ?? ' ')}}" required>
                    </div>


                    <div class="school-col">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" required value="{{old('address', $school->address ?? ' ')}}">
                    </div>
                </div>


                <div class="school-row">
                    <div class="school-col">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" required value="{{old('address', $school->email ?? ' ')}}">
                    </div>

                    <div class="school-col">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="" required value="{{old('address', $school->phone ?? ' ')}}">
                    </div>
                </div>
                


                <div class="school-row">
                    <div class="school-col">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" id="" value="{{old('address', $school->fax ?? ' ')}}">
                    </div>

                    
                    <div class="school-col">
                        <label for="">Facebook</label>
                        <input type="url" name="facebook" id="" value="{{old('address', $school->facebook ?? ' ')}}">
                    </div>
                </div>


                <div class="school-row">
                    <div class="school-col">
                        <label for="">LinkedIn</label>
                        <input type="url" name="linkedin" id="" value="{{old('address', $school->linkedin ?? ' ')}}">
                    </div>

                    
                    <div class="school-col">
                        <label for="">YouTube</label>
                        <input type="url" name="youtube" id="" value="{{old('address', $school->youtube ?? ' ')}}">
                    </div>
                </div>
                


                <div class="school-row">
                    <div class="school-col">
                        <label for="">Twitter</label>
                        <input type="twitter" name="twitter" id="" value="{{old('address', $school->twitter ?? ' ')}}">
                    </div>

                    
                    <div class="school-col">
                        <label for="">Instagram</label>
                        <input type="url" name="instagram" id="" value="{{old('address', $school->instagram ?? ' ')}}">
                    </div>
                </div>
                


                <div class="addUpdate-school-button-div">
                    <button type="submit" class="addUpdate-school-button">Submit</button>
                </div>

            </form>
        </div>

    </div>

@endsection