<div>
    <section id="listing_img_slider">
        <div>
            <img src="{{ asset('uploads/car1.jpg') }}" class="img-responsive" alt="image" width="900" height="560">
        </div>
        <div>
            <img src="{{ asset('uploads/car2.jpg') }}" class="img-responsive" alt="image" width="900" height="560">
        </div>
    </section>

    <!-- Listing-detail -->
    <section class="listing-detail">
        <div class="container">
            <div class="listing_detail_head row">
                <div class="col-md-9">
                    <h2>Mercedes-Benz C200</h2>
                </div>
                <div class="col-md-3">
                    <div class="price_info">
                        <p>70$</p>Per Day
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="main_features">
                        <ul>
                            <li><i class="fa fa-calendar"></i>
                                <h5>Viti i Prodhimit</h5>
                                <p>2020</p>
                            </li>
                            <li><i class="fa fa-gas-pump"></i>
                                <h5>Karburanti</h5>
                                <p>Naftë</p>
                            </li>
                            <li><i class="fa-solid fa-gauge"></i>
                                <h5>Kubikazha</h5>
                                <p>2000</p>
                            </li>
                            <li><i class="fa fa-cogs"></i>
                                <h5>Marshi</h5>
                                <p>Automatik</p>
                            </li>
                            <li><i class="fa fa-bolt"></i>
                                <h5>Fuqia</h5>
                                <p>150 HP</p>
                            </li>
                            <li><i class="fa fa-road"></i>
                                <h5>Kilometrat</h5>
                                <p>25,000 km</p>
                            </li>
                        </ul>
                    </div>

                    <div class="listing_more_info">
                        <div class="listing_detail_wrap">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs gray-bg" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#vehicle-overview" aria-controls="vehicle-overview" role="tab" data-toggle="tab">Pershkrimi i Vetures</a>
                                </li>
                                <li role="presentation">
                                    <a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Opsionet</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Vehicle Overview -->
                                <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                                    <p>
                                        Ky Mercedes-Benz C200 është në gjendje të shkëlqyer, ka motor ekonomik dhe është perfekt për udhëtime të gjata.
                                    </p>
                                </div>

                                <!-- Accessories -->
                                <div role="tabpanel" class="tab-pane" id="accessories">
                                    <table>
                                        <thead>
                                            <tr><th colspan="2">Opsionet</th></tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>AC</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>ABS</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Pasqyre Elektrike</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Dritare Elektrike</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Navigacion</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Karrikat Lekure</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Mbyllje Qendrore</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Ulse me Nxemje</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Asist Frenimi</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Driver Airbag</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Passenger Airbag</td><td><i class="fa fa-check"></i></td></tr>
                                            <tr><td>Senzora Parkimi</td><td><i class="fa fa-check"></i></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side-Bar -->
                <aside class="col-md-3">
                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-envelope"></i>Rezervo Tani</h5>
                        </div>
                        <form method="post" id="booking-form" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Emri dhe Mbiemri" required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="fromdate" required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="todate" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" value="Book Now">
                            </div>
                        </form>
                    </div>
                </aside>
                <!-- /Side-Bar -->
            </div>
        </div>
    </section>

    <!-- Back to top -->
    <div id="back-top" class="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </div>
</div>
