<section id="appointment" class="appointment section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Make an Appointment</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <form action="/user/booking-request" method="post" role="form" class="php-email-form">
        @csrf
        <div class="row">
          <div class="col-md-4 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group mt-3">
            <select name="service_id" id="service_id" class="form-select">
              <option value="">Pilih Pelayanan</option>
              @foreach ($services as $item)
                <option value="{{ $item->id }}">{{ $item->nama_service }}</option>
              @endforeach
            </select>
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group mt-3">
            <div class="form-group">              
              <input type="date" name="tanggal" min="2021-05-12" max="2022-01-01" id="datetime" placeholder="Appointment date" class="form-control" onchange="getJSON()">
          </div>
          </div>
          <div class="col-md-4 form-group mt-3">
            <select name="jam" id="jam" class="form-select">
              <option value="">Pilih Jam Konsultasi</option>
              @foreach ($jams as $item)
              <option id="jam{{ $item->id }}" value="{{ $item->id }}">{{ $item->jam }}</option>
              @endforeach
            </select>
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="messages" rows="5" placeholder="Message (Optional)"></textarea>
          <div class="validate"></div>
        </div>        
        <div class="text-center"><button type="submit">Make an Appointment</button></div>
      </form>

    </div>
</section>

@section('script')
  <script type="text/javascript">
    var datetime = new Date();
    var day = datetime.getDate();
    if (day < 10){
        day = `0${day}`;
    }
    var month = datetime.getMonth() + 1;
    if (month < 10){
        month = `0${month}`;
    }
    var year = datetime.getFullYear();
    var date = `${year}-${month}-${day}`;

    document.getElementById("datetime").setAttribute("min", date);

    $('#service_id').on('change', function() {
      $('#datetime').val(null);
    });

    function getJSON() {

        var service_id = $('#service_id').val()            
        console.log(service_id);
        
        $('#jam option').show();

        var datepick = new Date($('#datetime').val());
        var day = datepick.getDate();
        if (day < 10){
            day = `0${day}`;
        }
        var month = datetime.getMonth() + 1;
        if (month < 10){
            month = `0${month}`;
        }
        var year = datetime.getFullYear();
        var pickdate = `${year}-${month}-${day}`;

        console.log(pickdate);
        
        $.ajax({
            url: '/booking/get-dataBooking',
            type: 'get',
            dataType: 'json',
            data: {
                pickdate,
                service_id
            },
            success: function (response) {
                if(response) {
                    for (i = 0; i < response['data'].length; i++) {
                        var tanggal = response['data'][i].tanggal;
                        var service = response['data'][i].service_id;
                        var status = response['data'][i].status;                        
                        if (pickdate == tanggal & service_id == service) { 
                          var jam = response['data'][i].jam_id;
                          $(`#jam${jam}`).hide();                                      
                        } else {                            
                          var jam = response['data'][i].jam_id;
                          $(`#jam${jam}`).show(); 
                        }
                      }                        
                    }
                                      
                console.log(response);
            }
        });
    }
    
  </script>
@endsection