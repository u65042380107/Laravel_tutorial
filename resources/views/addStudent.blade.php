@extends('Layouts.app1')

@section('title')
    เพิ่มข้อมูลนักศึกษา
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            @if (Session::has('fail'))
            <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
        @endif
            <div class="card-header">
                เพิ่มข้อมูลนักศึกษา
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{route('insertstudent')}}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" name="idstudent" value="{{old('idstudent')}}" placeholder="กรอกรหัสนักศึกษา">
                        @error('idstudent')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">คำนำหน้า</label>
                        <select class="form-select" name='pname'>
                            <option selected disabled>โปรดเลือก</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                        @error('pname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="fname" value="{{old('fname')}}" placeholder="กรอกชื่อ">
                        @error('fname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" name="lname" value="{{old('lname')}}" placeholder="กรอกนามสกุล">
                        @error('lname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">เพศ</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="ชาย">
                                <label class="form-check-label">ชาย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="หญิง">
                                <label class="form-check-label">หญิง</label>
                            </div>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">ชั้นปี</label>
                        <select class="form-select" name='year'>
                            <option selected disabled>โปรดเลือก</option>
                            <option value=1>ชั้นปีที่ 1</option>
                            <option value=2>ชั้นปีที่ 2</option>
                            <option value=3>ชั้นปีที่ 3</option>
                            <option value=4>ชั้นปีที่ 4</option>
                        </select>
                        @error('year')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">สาขา</label>
                        <select class="form-select" name='major'>
                            <option selected disabled>โปรดเลือก</option>
                            <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                            <option value="วิทยาการข้อมูล">วิทยาการข้อมูล</option>
                            <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                        </select>
                        @error('major')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary  mt-3">ตกลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
