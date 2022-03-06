<div class="table-back employee-office-table mt-4">
    <div class="table-responsive">
        <table id="data-table" class="table custom-table table-hover table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Layanan</th>
                    <th>Tanggal / Waktu</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>                                                
                @foreach ($services as $key => $service)
                <tr>
                    <td id="asd">{{ $key + 1 }}</td>
                    <td>{{ $service->nama_service }}</td>
                    <td>{{ date('d M Y, h:i:a', strtotime($service->date)) }}</td>
                    <td>Rp{{ number_format($service->price, 0, ',', '.') }}</td>
                    <td>                                                                       
                            <button type="submit" class="btn btn-danger" 
                            onclick="submitBooking(
                                {{ $service->id }}
                            )">
                            Make a Trip</button>                                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
