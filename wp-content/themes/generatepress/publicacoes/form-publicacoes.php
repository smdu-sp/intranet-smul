<div>
    <h1>Publicações</h1>
</div>

<div class="row" v-for="publicacao in novaPublicacao">
    <div class="col-12 mb-5" v-if="!novaPublicacao.aberto">
        <div class="mb-5"><button @click="abrePublicacao()" type="button" class="btn btn-success">Nova Publicação</button></div>
    </div>
    <div class="col-12" v-if="novaPublicacao.aberto">
        <div class="row">
            <div class="col-6">
                <div v-for="valor, prop in publicacao">
                    <label v-if="prop != 'checkboxPraCegoVer' && prop != 'aberto'" :for="'nova-publicacao-' + prop">
                        {{labelsPublicacoes[prop]}}<b v-if="prop != 'pracegover'" class='obrigatorio'>*</b>
                        <b v-if="prop == 'imagem'" style="font-weight: normal">(<a href="/wp-admin/media-new.php" target="_blank">Upload de imagem</a>)</b>
                    </label>
                    <input class="ml-1" v-if="prop == 'pracegover'" type="checkbox" v-model="publicacao.checkboxPraCegoVer" @change="limpaCampo(prop)">
                    <input v-if="prop != 'checkboxPraCegoVer' && prop != 'aberto' && prop != 'pracegover'" type="text" class="form-control mb-2" :id="'nova-publicacao-' + prop" v-model="publicacao[prop]">
                    <input v-if="prop == 'pracegover'" type="text" class="form-control mb-2" :id="'nova-publicacao-' + prop" v-model="publicacao[prop]" :disabled="!publicacao['checkboxPraCegoVer']">
                </div>
                <div class="mt-5 row justify-content-end">
                    <div class="col-auto"><button @click="addPublicacao()" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-publicacoes" data-backdrop="static">Adicionar Publicação</button></div>
                </div>
            </div>
            <?php include 'single.php' ?>
        </div>
    </div>
</div>

<div v-for="publicacao, key in publicacoesRaw">
    <div class="row flex-row-reverse">
        <div :id="'publicacao-' + key" class="col-6">
            <button type="button" class="btn btn-primary" v-if="!publicacao.aberto" @click="abrePublicacao(key)">
                Editar
            </button>
            <div v-if="publicacao.aberto">
                <div v-for="valor, prop in publicacao">
                    <label :for="prop + '-' + key">{{labelsPublicacoes[prop]}}</label>
                    <input class="ml-1" v-if="prop == 'pracegover'" type="checkbox" v-model="publicacao.checkboxPraCegoVer" @change="limpaCampo(prop, key)">
                    <input class="form-control mb-2" :id="prop + '-' + key" v-if="prop == 'titulo' || prop =='imagem' || prop == 'link'" type="text" v-model="publicacao[prop]">
                    <input class="form-control mb-2" :id="prop + '-' + key" v-if="prop == 'pracegover'" type="text" v-model="publicacao[prop]" :disabled="!publicacao['checkboxPraCegoVer']">
                </div>
                <div class="row justify-content-end">
                    <div class="col-auto"><button @click="excluiPublicacao(key)" type="button" class="btn btn-danger">Excluir</button></div>
                    <div class="col-auto"><button @click="atualizaPublicacao(key)" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-publicacoes" data-backdrop="static">Atualizar</button></div>
                </div>
            </div>
        </div>
        <?php include 'single.php' ?>
    </div>
</div>
