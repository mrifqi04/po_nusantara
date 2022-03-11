<section id="appointment" class="appointment section-bg">
  <div class="container">
    <div class="section-title">
      <h2>Make a Trip</h2>
      <p>Anda bisa memesan dengan mengisi form yang kami sediakan dibawah ini.</p>
    </div>
    <div class="row">
      <div class="col-md-4 form-group">
        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4"
          data-msg="Please enter at least 4 chars">
        <div class="validate"></div>
      </div>
      <div class="col-md-4 form-group mt-3 mt-md-0">
        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email"
          data-msg="Please enter a valid email">
        <div class="validate"></div>
      </div>
      <div class="col-md-4 form-group mt-3 mt-md-0">
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4"
          data-msg="Please enter at least 4 chars">
        <div class="validate"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 form-group mt-3">
        <select name="depature" id="input_depature" class="form-select" onchange="updateServiceList()">
          <option value="">Lokasi Keberangkatan</option>
          @foreach ($depatures as $depature)
          <option value="{{ $depature->depature }}">{{ $depature->depature }}</option>
          @endforeach
        </select>
        <div class="validate"></div>
      </div>

      <div class="col-md-4 form-group mt-3">
        <select name="arrival" id="input_arrival" class="form-select" onchange="updateServiceList()">
          <option value="">Lokasi Tujuan</option>
          @foreach ($arrivals as $arrival)
          <option value="{{ $arrival->arrival }}">{{ $arrival->arrival }}</option>
          @endforeach
        </select>
        <div class="validate"></div>
      </div>
    </div>
    <div id="table-content" class="mt-5">
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
                <td>{{ $key + 1 }}</td>
                <td>{{ $service->nama_service }}</td>
                <td>{{ date('d M Y, h:i:a', strtotime($service->date)) }}</td>
                <td>Rp{{ number_format($service->price, 0, ',', '.') }}</td>
                <td>
                  <button type="submit" class="btn btn-sm">Make a Trip</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<form action="/user/booking-request" method="post" id="submit_booking">
  @csrf
  <input type="hidden" id="get_name" name="name">
  <input type="hidden" id="get_email" name="email">
  <input type="hidden" id="get_phone" name="phone">
  <input type="hidden" id="get_service_id" name="service_id">
</form>

@section('script')
<script>
  function updateServiceList()
  {
    var depature = $('#input_depature').val()
    var arrival = $('#input_arrival').val()
    
    $.ajax({
            url: "/get_service_list",
            type: 'get',
            data: {
                depature,
                arrival
            },
            cache: false,
            dataType: 'json',
            success: function(data) {                
               $('#table-content').html(data.view);    
               console.log(data)            
            },
            beforeSend: function() {
                $('#table-content').html('<p align="center">Loading...</p>');
            }
        });
  }

  function submitBooking(service_id)
  {
    var name = $('#name').val()
    var email = $('#email').val()
    var phone = $('#phone').val()  
    $('#get_name').val(name)  
    $('#get_email').val(email)  
    $('#get_phone').val(phone)  
    $('#get_service_id').val(service_id)  

    $( "#submit_booking" ).submit();
  }
</script>
@endsection