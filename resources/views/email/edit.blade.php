@extends('client_layout')
@section('title', 'Email')

@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gửi email</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Email</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Folders</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-envelope"></i> Soạn email
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>       
                </div>
                
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Soạn tin nhắn mới</h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" placeholder="To:">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Subject:">
                            </div>

                            <div class="form-group">
                                <textarea id="compose-textarea" class="form-control" style="height: 300px; display: none;">                      
                                    &lt;h1&gt;&lt;u&gt;Heading Of Message&lt;/u&gt;&lt;/h1&gt;
                                    &lt;h4&gt;Subheading&lt;/h4&gt;
                                    &lt;p&gt;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                                        was born and I will give you a complete account of the system, and expound the actual teachings
                                        of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                                        dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                                        how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                                        is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                                        but because occasionally circumstances occur in which toil and pain can procure him some great
                                        pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                                        except to obtain some advantage from it? But who has any right to find fault with a man who
                                        chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                                        produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                                        dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                                        blinded by desire, that they cannot foresee&lt;/p&gt;
                                    &lt;ul&gt;
                                        &lt;li&gt;List item one&lt;/li&gt;
                                        &lt;li&gt;List item two&lt;/li&gt;
                                        &lt;li&gt;List item three&lt;/li&gt;
                                        &lt;li&gt;List item four&lt;/li&gt;
                                    &lt;/ul&gt;
                                    &lt;p&gt;Thank you,&lt;/p&gt;
                                    &lt;p&gt;John Doe&lt;/p&gt;
                                </textarea>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                            </div>

                            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </section>
</div>
@endsection