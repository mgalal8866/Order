@props([
    'name' => 'Page',
    'index' => '/',
])

    <section    class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain" style="font-family: 'Cairo';">
                        {{-- <h2>{{$name}}</h2> --}}
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="/">
                                        <i class="fa-solid fa-house"></i>
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{$name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
