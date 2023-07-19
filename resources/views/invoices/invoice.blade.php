<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>General Invoice - Koice</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center">
                <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
                    <img id="logo" src="{{ asset('assets/images/logo.png') }}" title="Koice" alt="Koice" />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6"><strong>Date:</strong> {{ $invoice->created_at->format('d/m/y') }}</div>
                <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> {{ $invoice->invoice_no }}</div>

            </div>
            <hr>
            <div class="row">
                <div class="col-6"> <strong>Pay To:</strong>
                    <address>
                        Koice Inc<br />
                        2705 N. Enterprise St<br />
                        Orange, CA 92865<br />
                        contact@koiceinc.com
                    </address>
                </div>
                <div class="col-6 text-end"> <strong>Invoiced To:</strong>
                    <address>
                        {{ $invoice->customer->name }}<br />
                        {{ $invoice->customer->address }}<br />
                        Bangladesh<br />
                        {{ $invoice->customer->phone }}
                    </address>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="card-header">
                                <tr>
                                    <td class="col-3"><strong>#</strong></td>
                                    <td class="col-3"><strong>Product</strong></td>
                                    <td class="col-1 text-center"><strong>QTY</strong></td>
                                    <td class="col-2 text-center"><strong>Rate</strong></td>
                                    <td class="col-2 text-end"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td class="col-3">{{ $key + 1 }}</td>
                                    <td class="col-4 text-1">{{ $product->name }}</td>
                                    <td class="col-2 text-center">{{ $product->quantity }}</td>
                                    <td class="col-1 text-center">{{ $product->price }}/-</td>
                                    <td class="col-2 text-end">{{ $product->total }}/-</td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot class="card-footer">
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                    <td class="text-end">{{ $invoice->total }}/-</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Paid:</strong></td>
                                    <td class="text-end">{{ $invoice->total - $invoice->due }}/-</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end border-bottom-0"><strong>Due:</strong></td>
                                    <td class="text-end border-bottom-0">{{ $invoice->due }}/-</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                signature.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a
                    href="" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i>
                    Download</a> </div>
        </footer>
    </div>
</body>

</html>