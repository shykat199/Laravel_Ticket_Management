
<style>
    ._failed{ border-bottom: solid 4px red !important; }
    ._failed i{  color:red !important;  }

    ._success {
        box-shadow: 0 15px 25px #00000019;
        padding: 45px;
        width: 100%;
        text-align: center;
        margin: 40px auto;
        border-bottom: solid 4px #28a745;
    }

    ._success i {
        font-size: 55px;
        color: #28a745;
    }

    ._success h2 {
        margin-bottom: 12px;
        font-size: 40px;
        font-weight: 500;
        line-height: 1.2;
        margin-top: 10px;
    }

    ._success p {
        margin-bottom: 0px;
        font-size: 18px;
        color: #495057;
        font-weight: 500;
    }

    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    h1{
        text-align: center;
        font-family: 'Roboto', sans-serif;
        margin: 40px;
    }

      .container{
          display: block;
          margin-right: auto;
          margin-left: auto;
          width: fit-content;
          margin-top: 60px;
      }

      .btn{
          margin-right: 0.07rem;
          margin-left: 0.07rem;
          margin-bottom: 0.5rem;
          display: inline-block;
          font-weight: 400;
          text-align: center;
          white-space: nowrap;
          vertical-align: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          border: 1px solid transparent;
          padding: .375rem .75rem;
          font-size: 1rem;
          line-height: 1.5;
          border-radius: .25rem;
          transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
          cursor: pointer;
          -webkit-appearance: button;
          text-transform: none;
          overflow: visible;
          outline: none;
          &:hover, &:focus{
              text-decoration: none;
          }
      }

</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="message-box _success">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                <h2> Your payment was successful </h2>
                <p> Thank you for your payment<br></p>
{{--                <a href="{{route('frontend.ticket.store.payment-details',['payment' => 'true'])}}" class="btn btn-primary">Go Back</a>--}}
            </div>
        </div>
    </div>
</div>
