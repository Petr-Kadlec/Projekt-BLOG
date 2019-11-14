@extends("main")
@section("title" , "| Contact")
@section("content")
    <div class="row">
        <div class="col-md-12">
        <H1>Contact Me </H1>
        <hr>
        <form>
        <div class="form-group">
        <label name="email">Email:</label>
        <input id="email" name = "email" class="form-control"></label>
        </div>

        <div class="form-group">
        <label name="subject">Subject:</label>
        <input id="subject" name = "subject" class="form-control"></label>
        </div>

        <div class="form-group">
        <label name="message">Message:</label>
        <textarea id="message" name = "message" class="form-control" placeholder = >type your message here ...</textarea>
        </div>
        <input type = "submit" value = "Send Message" class ="btn btn-success"></input>
        </form>
        </div>

    
    @endsection
