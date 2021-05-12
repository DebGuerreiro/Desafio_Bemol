@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sua conta</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="needs-validation" method="POST" action="{{url('/cadastro')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="firstName">Nome completo</label>
                            <input readonly type="text" class="form-control" id="name" name="name" placeholder="" value="{{$user->name}}" required>
                                <div class="invalid-feedback">
                                Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="firstName">CPF</label>
                                <input readonly type="text" class="form-control" id="cpf" name="cpf" placeholder="" value="{{$user->cpf}}" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        <br>
                        <h4 class="mb-3">Endereço</h4>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="address">CEP</label>
                                <i class='fa fa-spinner fa-spin icon-load-cep' style='font-size:20px; display: none'></i>
                                <input readonly type="text" class="form-control" id="cep" name="cep" placeholder="" value="{{$address[0]->cep}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="address">Rua</label>
                                <input readonly type="text" class="form-control" id="rua" name="logradouro" value="{{$address[0]->logradouro}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="address">Nº</label>
                                <input readonly type="text" class="form-control" id="numero" name="numero" placeholder="" value="{{$address[0]->numero}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="address">Bairro</label>
                                <input readonly type="text" class="form-control" id="bairro" name="bairro" value="{{$address[0]->bairro}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>                    
                        </div>
        
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label for="address">Complemento</label>
                                <input readonly type="text" class="form-control" id="complemento" name="complemento" value="{{$address[0]->complemento}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="address">Cidade</label>
                                <input readonly type="text" class="form-control" id="cidade" name="localidade" value="{{$address[0]->localidade}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="address">UF</label>
                                <input readonly type="text" class="form-control" id="uf" name="uf" value="{{$address[0]->uf}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
        
                        </div>
        
                        <br>
                        <br>
                        <h4 class="mb-3">Contato</h4>
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label for="address">DDD</label>
                                <input readonly type="text" class="form-control" id="ddd" name="ddd" placeholder="" value="{{$contact[0]->ddd}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="address">Telefone Residencial</label>
                                <input readonly type="text" class="form-control" id="tel_resid" name="tel_resid" placeholder="" value="{{$contact[0]->tel_resid}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="address">Celular</label>
                                <input readonly type="text" class="form-control" id="tel_cel" name="tel_cel" placeholder="" value="{{$contact[0]->tel_cel}}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="email">E-mail</label>
                                <input readonly type="email" class="form-control" id="email" name="email" placeholder="" value="{{$user->email}}">
                                <div class="invalid-feedback">
                                    Insira um e-mail válido.
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-8 offset-md-4" >
                                <a href="{{url('/editar')}}" class="btn btn-primary">Editar Cadastro</a>
                                <a href="#" class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">Deletar conta</a>
                            </div>
                        </div>
                        
                        
                    </form>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Atenção!</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        
                            <!-- Modal body -->
                            <div class="modal-body">
                                Você gostaria mesmo de excluir sua conta?
                            </div>
                        
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <form action="{{url('/excluir')}}" method="POST">
                                @csrf
                                    <button type="submit" class="btn btn-danger">Sim</button>
                                
                                </form> 
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>                                                               
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
