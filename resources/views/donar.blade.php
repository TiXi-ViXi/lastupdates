<link rel="stylesheet" href="{{asset('css/donar.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<body class = "body">
    <!-- Header -->
    <header></header>
    <!-- Main -->
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 left-section">
                    <div class="user-background"> <img class="background-img"
                            src="image\donar.jpg" alt=""></div>
                </div>
                <div class="col-md-8 right-section">
                    <div class="content mt-10">
                        <h2 class="form-heading">Donar Information Form</h2>
                        <form class="login_form"  action="{{route('storeDonar.class')}}" method= "post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control item" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control item" name="age" placeholder="Age">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="gender">
                                    <option selected="true" disabled="disabled">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="city">
                                    <option selected="true" disabled="disabled">Current City</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Barishal">Barishal</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Rangpur">Rangpur</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control item" name="phone" placeholder="Contact Number">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="bloodgroup">
                                    <option selected="true" disabled="disabled">Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control item" name="lastdonation">
                            </div>
                            
                            <div class="form-group">
                                <select class="form-control" name="availablity">
                                    <option selected="true" disabled="disabled">Are You Available For Donating Blood?</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    </select>
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary pulse-button">Submit</button>
                                <input class="btn btn-block" type="reset">
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer> </footer>
    <!-- BS JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
