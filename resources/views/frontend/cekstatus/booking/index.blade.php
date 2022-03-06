@extends('layouts.frontend')

@section('content')

@if (session()->has('msg'))
<div class="alert alert-success">
    {{ session()->get('msg') }}
</div>
@endif

<div class="container" style="margin-top: 10%; margin-bottom: 7%;">
    <!-- Tab panes -->
    <div class="tab-content">
        <div id="orders" class="container tab-pane active"><br>
            <h3>Status Booking</h3>
            <hr>
            <div class="content table-responsive table-full-width">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Data Pemesan</th>
                            <th>Layanan</th>
                            <th>Waktu Keberangkatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($bookings as $i => $item)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                {{ $item->user_id }} <br>
                                {{ $item->name }} <br>
                                {{ $item->email }} <br>
                                {{ $item->phone }}
                            </td>
                            <td>
                                {{ $item->service->nama_service }} <br>
                                Rp{{ number_format($item->service->price, 0, ',', '.') }}
                            </td>
                            <td>{{ date('d M Y, h:i:a', strtotime($item->service->date)) }}</td>
                            <td>
                                @if($item->status == 'PENDING')
                                Sedang menunggu konfirmasi dari Admin
                                @elseif($item->status == 'ACCEPTED')
                                <form action="/user/payment/{{ $item->id }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <p>Pesanan diterima, <br> mohon upload bukti pembayaran</p>
                                    <input type='file' name='payment' id='file' class='form-control'> <br>
                                    <button type="submit" class="mb-2 btn btn-sm btn-primary">
                                        Upload
                                    </button>
                                </form>
                                @elseif($item->status == 'VERIFYING')
                                Sedang menunggu konfirmasi <br> pembayaran dari Admin
                                @elseif($item->status == 'CONFIRMED')
                                Pembayaran diterima,<br>mohon melakukan <br>
                                keberangkatan tepat waktu
                                @else
                                <a href="{{asset('uploads')}}/{{ $item->payment }}" target="_blank">Lihat </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>

@endsection