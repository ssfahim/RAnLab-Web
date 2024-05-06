<x-app-layout>
    
    <form action="{{url('/add')}}" method="POST">
        @csrf
        <div style="text-align: start; font-weight: bold;">
            <div class="form-group">
                <br>
                <div class="col-sm-5">
                    <h5>Name:</h5><input type="text" class="form-control" id="name" name="name" placeholder="Name: John Smith">
                </div>
            </div>
            <div class="form-group">
                <br>
                <div class="col-sm-5">
                    <h5>Email:</h5><input type="text" class="form-control" id="email" name="email" placeholder="Email: ranlab@mun.ca">
                </div>
            </div>
            <div class="form-group">
                <br>
                <div class="col-sm-10">
                    <h5>Message:</h5><textarea class="form-control" id="message" name="message" placeholder="Your message" style="resize: vertical;"></textarea>
                </div>
            </div>
            <div class="modal-footer" style="align-content: flex-start">
                <input type="submit" class="btn btn-primary" value="Save changes" style="background-color: rgb(0, 255, 102)">
            </div>
        </div>
        
    </form>
</x-app-layout>