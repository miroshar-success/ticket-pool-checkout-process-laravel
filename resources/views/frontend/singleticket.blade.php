  <!doctype html>
  <html lang="en">

  <head>
      <title>My-Order</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
      <style>
          @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
      </style>
      <?php $primary_color = \App\Models\Setting::find(1)->primary_color; ?>
      <style>
          body {
              background: <?php echo $primary_color . '1a'; ?>;
          }

          .ticket-wrap {
              text-align: center;
          }

          .ticket {
              border-radius: 2%;
              display: inline-block;
              margin: 0 auto;
              border: 2px solid #9facbc;
              font-family: 'Roboto', sans-serif;
              /* font-family: "Variable Bahnschrift", "FF DIN", "Franklin Gothic", "Helvetica Neue", sans-serif; */
              font-feature-settings: "kern"1;
              background: #fff;
          }

          .ticket__header {
              border-radius: 4%;
              margin: 0;
              padding: 1.5em;
              background: <?php echo $primary_color . 'a8'; ?>;
          }

          .ticket__co span,
          .ticket__route span {
              display: block;
          }

          .ticket__co {
              display: inline-block;
              position: relative;
              line-height: 1;
              color: #black;

          }

          .ticket__co-icon {
              position: absolute;
              top: 50%;
              margin-top: -2em;
              left: 0;
              width: 4em;
              height: auto;
          }

          .ticket__co-name {
              font-size: 2.5em;
              font-variation-settings: "wght"500, "wdth"75;
              letter-spacing: -.01em;
          }

          .ticket__co-subname {
              font-variation-settings: "wght"700;
              color: #black;
          }

          .ticket__body {
              padding: 2rem 1.25em 1.25em;

          }

          .ticket__route {
              font-variation-settings: "wght"300;
              font-size: 2em;
              line-height: 1.1;
          }

          .ticket__description {
              margin-top: .5em;
              font-variation-settings: "wght"350;
              font-size: 1.125em;
              color: #black;
          }

          .ticket__timing {
              display: flex;
              align-items: center;
              margin-top: 1rem;
              padding: 1rem 0;
              text-align: left;
              border-top: 2px solid #9facbc;
              border-bottom: 2px solid #9facbc;

          }

          .ticket__timing p {
              margin: 0 1rem 0 0;
              padding-right: 1rem;
              border-right: 2px solid #9facbc;
              line-height: 1;
          }

          .ticket__timing p:last-child {
              margin: 0;
              padding: 0;
              border-right: 0;
          }

          .ticket__small-label {
              display: block;
              margin-bottom: .5em;
              font-variation-settings: "wght"300;
              font-size: .875em;
              color: #black;
          }

          .ticket__detail {
              font-variation-settings: "wght"700;
              font-size: 1.25em !important;
              color: #black;
          }

          .ticket__admit {
              margin-top: 2rem;
              font-size: 2.5em;
              font-variation-settings: "wght"700, "wdth"85;
              line-height: 1;
              color: #black;
          }

          .ticket__fine-print {
              margin-top: 1rem;
              font-variation-settings: "wdth"75;
              color: #black;
          }

          .ticket__barcode {
              margin-top: 1.25em;
              width: 299px;
              max-width: 100%;
          }

          @media (min-width: 38em) {
              .ticket-wrap {
                  margin-bottom: 4em;
                  text-align: center;
              }

              .ticket {

                  margin: 0 auto;
                  transform: rotate(0deg);
              }

              .ticket__header {
                  margin: 0;
                  padding: 2em;
              }

              .ticket__body {
                  padding: 3rem 2em 2em;
              }

              .ticket__detail {
                  font-size: 1.75em;
              }

              .ticket__admit {
                  margin-top: 2rem;
              }
          }

          @supports (display: grid) {
              @media (min-width: 73em) {

                  .ticket-info,
                  .ticket-wrap {
                      align-self: center;
                  }

                  .ticket-wrap {
                      order: 2;
                      margin-bottom: 0;
                  }

                  .ticket-info {
                      order: 1;
                  }
              }
          }

          @media (max-width: 769px) and (min-width:426px) {
              .col-md-4 {
                  max-width: 100% !important;
                  flex: 1;
              }

              .ticket {
                  width: auto;
              }
          }

          @media (max-width: 1024px) and (min-width:770px) {
              .col-md-4 {
                  max-width: 100% !important;
                  flex: 1;
              }

              .ticket {
                  width: auto;
              }
          }

          .row {
              margin: 0;
          }
      </style>
  </head>

  <body>
      <div class=" container-fluid">
          <div class="row text-capitalize justify-content-center">
              @foreach ($orderchild as $item)
                  <div class="mt-5 l-col-right ticket-wrap col-md-4  bg-gradient">
                      <div class="ticket shadow  border-0 " aria-hidden="true">
                          <div class="ticket__header ">
                           
                              <div class="ticket__co ">
                                  <span class="ticket__co-name">{{ $order->ticket->name }}</span>
                                  <span class="u-upper ticket__co-subname mt-3">{{ $order->ticket->description }}</span>
                              </div>
                          </div>
                          <div class="ticket__body">
                              <p class="ticket__route">{{ $order->event->name }}</p>
                              <p class="ticket__description ">{{ $order->event->description }}</p>
                              <div class="ticket__timing">
                                  <p>
                                      <span class="u-upper ticket__small-label">Start Date</span>
                                      <span
                                          class="ticket__detail">{{ $order->ticket->start_time->format('Y-m-d') }}</span>

                                  </p>
                                  <p>
                                      <span class="u-upper ticket__small-label">Start Time</span>
                                      <span
                                          class="ticket__detail">{{ $order->ticket->start_time->format('H:i:s') }}</span>
                                  </p>

                                  <p>
                                      <span class="u-upper ticket__small-label">Organizer</span>
                                      <span class="ticket__detail">{{ $order->organization->name }}</span>
                                  </p>
                              </div>

                              <div class="ticket__detail text-left mt-3">

                                  Valid : <br>

                                  @if ($order->ticket->allday == 0)
                                      Only one time use.
                                  @else
                                      Ticket valid up to whole event.
                                  @endif

                              </div>
                              <div class="ticket__detail text-left mt-3">

                                  Address : <br>

                                  {{ $order->event->address }}
                              </div>
                              <div class="ticket__detail text-left mt-3">

                                Attendees Name : <br>
                               
                                {{ $order->customer->name ." ". $order->customer->last_name}}
                            </div>
                              <div>
                                  {!! QrCode::size(200)->generate($item->ticket_number) !!}
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
          integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
      </script>
  </body>

  </html>
