<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produtos</div>

                <div class="card-body">

                <div class="alert alert-secondary alert-dismissible fade show" v-if="salvarStatus" role="alert">
                    <strong>{{salvarStatus}}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#produtoModal">Adicionar</button>
                    <button type="button" class="btn btn-danger" disabled>Excluir</button>
                </div>
                <br>
                <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="prod in produtos" :key="prod.id">
                            <th>{{prod.id}}</th>
                            <td>{{prod.nome}}</td>
                            <td>{{prod.categoria}}</td>
                            <td>{{prod.status_prod}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-warning btn-sm" disabled>Editar</button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#excluirProdutoModal">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="produtoModal" tabindex="-1" aria-labelledby="produtoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produtoModalLabel">Adicionar Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
            <form>
            <div>
                <div class="form-group">
                    <label for="nome">Nome do produto</label>
                    <input type="text" class="form-control" id="nome" v-model="nome" placeholder="digite aqui o nome do produto">
                </div>
                <div class="form-group">
                    <label for="nome">Preço do produto</label>
                    <input type="text" class="form-control" id="preco" v-model="preco" placeholder="digite aqui o preço do produto">
                </div>
                <div class="form-group">
                <label for="nome">Status do produto</label>
                <select class="form-control form-select" v-model="status_prod" aria-label="Default select example">
                    <option selected>Status</option>
                    <option value="Em estoque">Em estoque</option>
                    <option value="Fora de estoque">Fora de estoque</option>
                    <option value="Descontinuado">Descontinuado</option>
                </select>
                </div>
                <div class="form-group">
                <label for="nome">Categoria do produto</label>
                <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" v-model="categoria" value="laticinios">
                    <label class="form-check-label" for="inlineRadio1">Laticínios</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" v-model="categoria" value="embutidos">
                    <label class="form-check-label" for="inlineRadio2">Embutidos</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" v-model="categoria" value="carnes">
                    <label class="form-check-label" for="inlineRadio3">Carnes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" v-model="categoria" value="graos">
                    <label class="form-check-label" for="inlineRadio4">Grãos</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" v-model="categoria" value="frutas">
                    <label class="form-check-label" for="inlineRadio5">Frutas</label>
                </div>
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" v-model="categoria" value="legumes">
                    <label class="form-check-label" for="inlineRadio6">Legumes</label>
                </div>
                </div>
                </div>
            </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="salvar()">Salvar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- /Modal -->

    <!-- Modal de remoção -->
    <div class="modal fade" id="excluirProdutoModal" tabindex="-1" aria-labelledby="excluirProdutoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirProdutoModalLabel">Tem certeza que deseja excluir este Produto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
            <form>
            <div>
                <div class="form-group">
                    <label for="nome">Nome do produto</label>
                    <input type="text" class="form-control" id="nome" v-model="nome" placeholder="nome do produto" disabled>
                </div>
                <div class="form-group">
                    <label for="nome">Preço do produto</label>
                    <input type="text" class="form-control" id="preco" v-model="preco" placeholder="preço do produto" disabled>
                </div>
                 <div class="form-group">
                    <label for="nome">Categoria do produto</label>
                    <input type="text" class="form-control" id="categoria" v-model="categoria" placeholder="categoria do produto" disabled>
                </div>
                 <div class="form-group">
                    <label for="nome">Status do produto</label>
                    <input type="text" class="form-control" id="status_prod" v-model="status_prod" placeholder="status do produto" disabled>
                </div>
                
            </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="excluir()">Excluir</button>
            </div>
            </div>
        </div>
    </div>
    <!-- /Modal -->

</div>
</template>

<script>
export default{
    data(){
        return {
            urlBase: 'http://localhost:8000/api/produto',
            nome: '',
            preco: '',
            categoria: '',
            status_prod: '',
            salvarStatus: '',
            produtos:[]
        }
    },
    methods:{
        listar(){
            axios.get(this.urlBase)
            .then(response => {
                this.produtos = response.data
                console.log(response)
            })
            .catch(errors => {
                console.log(errors)
            })
        },
        salvar(){

            let formData = new FormData();
            formData.append('nome', this.nome);
            formData.append('preco', this.preco);
            formData.append('categoria', this.categoria);
            formData.append('status_prod', this.status_prod);

            let config = {
                Headers:{
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Accept': 'application/json'
                }
            }
            axios.post(this.urlBase,formData, config)
            .then(response => {
                this.salvarStatus = 'Sucesso!'
                console.log(response)
                $('#produtoModal').modal('hide')
            })
            .catch(errors => {
                this.salvarStatus = 'Erro!'
                console.log(errors)
                $('#produtoModal').modal('hide')
            })
        },
        excluir(){

        }
    },
    mounted() {
        this.listar()
    }
}
</script>
