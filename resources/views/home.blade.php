@extends('layouts.app1')

@section('title')
    หน้าหลัก
@endsection

@section('content')
    <div class="card">
        @if (Session::has('success'))
            <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
        @endif
        @if (Session::has('fail'))
            <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
        @endif
        <div class="card-header">
            ข้อมูลนักศึกษา
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">รหัสนักศึกษา</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">ชั้นปี</th>
                        <th scope="col">สาขา</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($all_student) > 0)
                        @foreach ($all_student as $item)
                            <tr>
                                <td scope="col">{{ $loop->iteration}}</td>
                                <td>{{ $item->idstudent}}</td>
                                <td>{{ $item->pname}}{{ $item->fname}}&nbsp;&nbsp;{{ $item->lname}}</td>
                                <td>{{ $item->year }}</td>
                                <td>{{ $item->major }}</td>
                                <td>
                                    <a href="{{ route('edit', ['id' => $item->idstudent]) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> แก้ไข
                                    </a>
                                    <a href="{{ route('delete', ['id' => $item->idstudent]) }}" class="btn btn-danger" onclick="return confirm('คุณต้องการลบ {{ $item->pname }}{{ $item->fname }} {{ $item->lname }} หรือไม่?')">
                                        <i class="fas fa-trash"></i> ลบ
                                    </a>
                                </td>
                                
                                {{-- <td>{{ $item['major'] }}</td> --}}
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6">ไม่พบข้อมูล</td>
                    </tr>
                    @endif

                </tbody>
            </table>
            {{$all_student->links('pagination::bootstrap-5')}}
        </div>
    </div>
@endsection