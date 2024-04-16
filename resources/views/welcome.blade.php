<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Strip Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom styles */
        .product-card {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Your Brand</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Product Grid -->
    <div class="container mt-4">
        <form action="" method="POST">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            <!-- Product Card 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/200" class="card-img-top product-img" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Silver 1</h5>
                        <p>Product number 1</p>
                        <p class="card-text">Price: $10.00</p>
                        <input type="hidden" name="description" value="This is Fake Product.">
                        <a href="{{ route('stripe.checkout',['price' => 10, 'product' => 'silver']) }}" class="btn btn-primary">Buy Item</a>

                        {{-- <a href="{{ route('stripe.checkout',['price' => 10, 'product' => 'silver']) }}" class="btn btn-primary">Buy Item</a> --}}
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/200" class="card-img-top product-img" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Golden 2</h5>
                        <p>Product number 2</p>
                        <p class="card-text">Price: $100.00</p>
                        <a href="{{ route('stripe.checkout',['price' => 100, 'product' => 'gold']) }}" class="btn btn-primary">Buy Item</a>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/200" class="card-img-top product-img" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Platinum 3</h5>
                        <p>Product number 3</p>
                        <p class="card-text">Price: $1000.00</p>
                        <a href="{{ route('stripe.checkout',['price' => 1000, 'product' => 'platinum']) }}" class="btn btn-primary">Buy Item</a>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
