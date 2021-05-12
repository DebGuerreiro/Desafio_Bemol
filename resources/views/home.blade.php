@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{url('/cadastro')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <label for="firstName">Nome completo</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                    Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="firstName">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="" required>
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
                                    <input type="text" class="form-control" id="cep" name="cep" placeholder="99.999-999" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address">Rua</label>
                                    <input type="text" class="form-control" id="rua" name="logradouro" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-md-1 mb-3">
                                    <label for="address">Nº</label>
                                    <input type="text" class="form-control" id="numero" name="numero" placeholder="000" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="address">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>                    
                            </div>
            
                            <div class="row">
                                <div class="col-md-7 mb-3">
                                    <label for="address">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="address">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="localidade" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="address">UF</label>
                                    <input type="text" class="form-control" id="uf" name="uf" required>
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
                                    <input type="text" class="form-control" id="ddd" name="ddd" placeholder="00" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="address">Telefone Residencial</label>
                                    <input type="text" class="form-control" id="tel_resid" name="tel_resid" placeholder="99999-9999" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="address">Celular</label>
                                    <input type="text" class="form-control" id="tel_cel" name="tel_cel" placeholder="99999-9999" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="voce@exemplo.com">
                                    <div class="invalid-feedback">
                                        Insira um e-mail válido.
                                    </div>
                                </div>
                            </div>
            
                            <br>
                            <br>
                            <h4 class="mb-3">Definir senha</h4>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="address">Nova senha</label>
                                    <input type="password" class="form-control" id="senha" name="password" maxlength="8" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="address">Confirmar senha</label>
                                    <input type="password" class="form-control" id="conf_senha" name="senha" maxlength="8" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div align="center">
                                <button class="btn btn-primary" type="submit">Criar conta</button>
                            </div>
                           
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
