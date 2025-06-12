new window.VLibras.Widget('https://vlibras.gov.br/app');
/*
const servicos = [
  { nome: "Clínica Acolher", estado: "MG", cidade: "Uberaba", tipo: "Saúde", descricao: "Psicologia com Libras", lat: -19.7477, lng: -47.9318 },
  { nome: "Escola Inclusiva SP", estado: "SP", cidade: "São Paulo", tipo: "Educação", descricao: "Ensino acessível", lat: -23.5505, lng: -46.6333 },
  { nome: "Hospital Vida", estado: "MG", cidade: "Belo Horizonte", tipo: "Saúde", descricao: "Emergência com intérprete", lat: -19.9191, lng: -43.9386 },
  { nome: "Centro Cultural Acesso", estado: "SP", cidade: "Campinas", tipo: "Cultura", descricao: "Eventos com Libras", lat: -22.9099, lng: -47.0626 },
  { nome: "Faculdade Libras", estado: "SP", cidade: "São Paulo", tipo: "Educação", descricao: "Cursos com acessibilidade", lat: -23.5489, lng: -46.6388 },
  { nome: "Clínica Bem Estar", estado: "MG", cidade: "Uberlândia", tipo: "Saúde", descricao: "Fonoaudiologia acessível", lat: -18.9146, lng: -48.2754 },
  { nome: "Biblioteca Acessível", estado: "MG", cidade: "Uberaba", tipo: "Cultura", descricao: "Leitura com intérprete", lat: -19.7432, lng: -47.9299 },
  { nome: "Oficina do Saber", estado: "SP", cidade: "Campinas", tipo: "Educação", descricao: "Reforço escolar com Libras", lat: -22.9056, lng: -47.0609 },
  { nome: "Centro Médico Popular", estado: "SP", cidade: "Santos", tipo: "Saúde", descricao: "Consultas com intérprete", lat: -23.9608, lng: -46.3336 },
  { nome: "Espaço Jovem Acessível", estado: "MG", cidade: "Belo Horizonte", tipo: "Cultura", descricao: "Projetos jovens com acessibilidade", lat: -19.9245, lng: -43.9352 }
];
const vagas = [
  { nome: "Auxiliar Administrativo", estado: "MG", cidade: "Uberaba", tipo: "Administração", descricao: "Empresa inclusiva", lat: -19.75, lng: -47.93 },
  { nome: "Atendente Loja", estado: "SP", cidade: "São Paulo", tipo: "Comércio", descricao: "Loja com intérprete", lat: -23.55, lng: -46.64 },
  { nome: "Recepcionista", estado: "MG", cidade: "Belo Horizonte", tipo: "Atendimento", descricao: "Ambiente acessível", lat: -19.9167, lng: -43.9345 },
  { nome: "Assistente de RH", estado: "SP", cidade: "Campinas", tipo: "Administração", descricao: "Inclusão ativa", lat: -22.9083, lng: -47.0626 },
  { nome: "Estoquista", estado: "MG", cidade: "Uberlândia", tipo: "Logística", descricao: "Armazém adaptado", lat: -18.9181, lng: -48.2749 },
  { nome: "Monitor Escolar", estado: "SP", cidade: "São Paulo", tipo: "Educação", descricao: "Escola bilíngue Libras", lat: -23.5523, lng: -46.6345 },
  { nome: "Técnico de Informática", estado: "MG", cidade: "Uberaba", tipo: "Tecnologia", descricao: "Empresa com acessibilidade digital", lat: -19.7475, lng: -47.9319 },
  { nome: "Analista de Dados Júnior", estado: "SP", cidade: "Campinas", tipo: "Tecnologia", descricao: "Home office acessível", lat: -22.9068, lng: -47.0622 },
  { nome: "Revisor de Textos", estado: "MG", cidade: "Belo Horizonte", tipo: "Comunicação", descricao: "Trabalho remoto com inclusão", lat: -19.9198, lng: -43.9384 },
  { nome: "Promotor de Vendas", estado: "SP", cidade: "Santos", tipo: "Comércio", descricao: "Equipe treinada em Libras", lat: -23.9611, lng: -46.3332 }
];
*/

fetch('/dados-home')
  .then(response => response.json())
  .then(data => {
    const servicos = data.servicos;
    const vagas = data.vagas;

    criarFiltros(servicos, 'filtrosServicos', 'servicos', 'servicosFiltro');
    criarFiltros(vagas, 'filtrosVagas', 'vagas', 'vagasFiltro');

    window.servicosFiltro = appFiltros(servicos, 'servicos', 'listaServicos', 'map');
    window.vagasFiltro = appFiltros(vagas, 'vagas', 'listaVagas', 'mapVagas');
  })
  .catch(error => {
    console.error('Erro ao carregar dados da home:', error);
  });


function criarFiltros(dados, containerId, prefixo, aoSelecionar) {
  const estados = [...new Set(dados.map(d => d.estado))];
  const container = document.getElementById(containerId);
  container.innerHTML = '';

  const colEstado = document.createElement('div');
  colEstado.className = 'col-md-4';
  colEstado.innerHTML = `
    <div class="accordion" id="${prefixo}Estado">
      <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${prefixo}Estado">Estado</button></h2>
        <div id="collapse${prefixo}Estado" class="accordion-collapse collapse show">
          <div class="accordion-body">
            <button class="btn btn-outline-primary w-100 mb-2" onclick="${aoSelecionar}.estado('todos')">Todos</button>
            ${estados.map(estado => `<button class="btn btn-outline-primary w-100 mb-2" onclick="${aoSelecionar}.estado('${estado}')">${estado}</button>`).join('')}
          </div>
        </div>
      </div>
    </div>`;
  
  const colCidade = document.createElement('div');
  colCidade.className = 'col-md-4';
  colCidade.innerHTML = `
    <div class="accordion" id="${prefixo}Cidade">
      <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${prefixo}Cidade">Cidade</button></h2>
        <div id="collapse${prefixo}Cidade" class="accordion-collapse collapse show">
          <div class="accordion-body" id="${prefixo}Cidades"></div>
        </div>
      </div>
    </div>`;
  
  const colTipo = document.createElement('div');
  colTipo.className = 'col-md-4';
  colTipo.innerHTML = `
    <div class="accordion" id="${prefixo}Tipo">
      <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${prefixo}Tipo">Tipo</button></h2>
        <div id="collapse${prefixo}Tipo" class="accordion-collapse collapse show">
          <div class="accordion-body" id="${prefixo}Tipos"></div>
        </div>
      </div>
    </div>`;

  container.append(colEstado, colCidade, colTipo);
}

function appFiltros(dados, prefixo, listaId, mapId) {
  let estadoSelecionado = 'todos';
  let cidadeSelecionada = 'todas';
  let tipoSelecionado = 'todos';
  const lista = document.getElementById(listaId);
  let map = L.map(mapId).setView([-19.75, -47.93], 6);
  let markers = [];

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap'
  }).addTo(map);

  function renderizar() {
    const filtrados = dados.filter(d => 
      (estadoSelecionado === 'todos' || d.estado === estadoSelecionado) &&
      (cidadeSelecionada === 'todas' || d.cidade === cidadeSelecionada) &&
      (tipoSelecionado === 'todos' || d.tipo === tipoSelecionado)
    );
    lista.innerHTML = '';
    markers.forEach(m => map.removeLayer(m));
    markers = [];

    filtrados.forEach(d => {
      const card = document.createElement('div');
      card.className = 'col-md-4';
      card.innerHTML = `<div class="card shadow-sm"><div class="card-body"><h5>${d.nome}</h5><p>${d.descricao}</p><p class="text-muted">${d.cidade} • ${d.tipo}</p></div></div>`;
      lista.appendChild(card);

      const marker = L.marker([d.lat, d.lng]).addTo(map)
        .bindPopup(`<strong>${d.nome}</strong><br>${d.descricao}<br><em>${d.cidade} • ${d.tipo}</em>`);
      markers.push(marker);
    });

    if (filtrados.length > 0) {
      const group = new L.featureGroup(markers);
      map.fitBounds(group.getBounds(), { padding: [30, 30] });
    }
    atualizarCidades();
    atualizarTipos();
  }

  function atualizarCidades() {
    const cidades = [...new Set(dados
      .filter(d => estadoSelecionado === 'todos' || d.estado === estadoSelecionado)
      .map(d => d.cidade))];
    const container = document.getElementById(`${prefixo}Cidades`);
    container.innerHTML = `<button class="btn btn-outline-primary w-100 mb-2" onclick="${prefixo}Filtro.cidade('todas')">Todas</button>`;
    cidades.forEach(c => {
      container.innerHTML += `<button class="btn btn-outline-primary w-100 mb-2" onclick="${prefixo}Filtro.cidade('${c}')">${c}</button>`;
    });
  }

  function atualizarTipos() {
    const tipos = [...new Set(dados
      .filter(d => (estadoSelecionado === 'todos' || d.estado === estadoSelecionado) &&
                   (cidadeSelecionada === 'todas' || d.cidade === cidadeSelecionada))
      .map(d => d.tipo))];
    const container = document.getElementById(`${prefixo}Tipos`);
    container.innerHTML = `<button class="btn btn-outline-primary w-100 mb-2" onclick="${prefixo}Filtro.tipo('todos')">Todos</button>`;
    tipos.forEach(t => {
      container.innerHTML += `<button class="btn btn-outline-primary w-100 mb-2" onclick="${prefixo}Filtro.tipo('${t}')">${t}</button>`;
    });
  }

  const api = {
    estado: est => { estadoSelecionado = est; cidadeSelecionada = 'todas'; tipoSelecionado = 'todos'; renderizar(); },
    cidade: cid => { cidadeSelecionada = cid; tipoSelecionado = 'todos'; renderizar(); },
    tipo: t => { tipoSelecionado = t; renderizar(); }
  };

  renderizar();
  return api;
}