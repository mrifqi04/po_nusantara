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
                <h3>Transactions</h3>
                <hr>
                <div class="content table-responsive table-full-width">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>														
                                <th>Data Pasien</th>														
                                <th>Pelayanan</th>														
                                <th>Dokter</th>
                                <th>Waktu Pertemuan</th>														
                                <th>Status</th>                                
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($transactions as $i => $item)
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
                                        @if ($item->massages)
                                            <i>" Catatan :  {{ $item->messages }} "</i> 
                                        @endif
                                    </td>
                                    <td>
                                        {{ $dokter->name }} <br>
                                        {{ $dokter->email }} <br>
                                        {{ $dokter->no_telp }}
                                    </td>
                                    <td>
                                        {{ date('j F, Y', strtotime($item->tanggal)) }} <br>
                                        Jam-{{ $item->jam->jam }}
                                    </td>														
                                    <td>															
                                        <a class="accepted-btn scrollto">
                                            <span class="d-none d-md-inline">DONE</span>
                                        </a>				
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