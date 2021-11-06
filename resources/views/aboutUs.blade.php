<!DOCTYPE html>
<html>

@include('layouts.head', ['title' => 'FoodCity-About Us'])

<body>
    <div class="hero_area sub_pages">
        <!-- header section strats -->
        @include('layouts.header')
        <!-- end header section -->
    </div>

    <!-- contact section -->
    <section class="contact_section4 layout_padding">
        <div class="container" style="padding-top:20px">
            <img src="images/contact.png" alt="" style="height:50px; width:50px" />
            <span class="font-weight-bold" style="font-size:xx-large; margin-left:20px">
                About Us
            </span>
            <div class="row" style="margin-top:20px">
                <div class="col-md-8 mr-auto">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->

    @include('layouts.footer')
</body>

</html>
