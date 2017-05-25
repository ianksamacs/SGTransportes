
--
-- Database: `sgtrans`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numeroCasa` int(11) NOT NULL,
  `semestreAtual` varchar(6) NOT NULL,
  `semestreEntrada` varchar(6) NOT NULL,
  `fotoUrl` varchar(50) NOT NULL,
  `matriculaUrl` varchar(50) NOT NULL,
  `compResidenciaUrl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `idInstituicao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia`
--

CREATE TABLE `dia` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `ida` int(1) NOT NULL,
  `volta` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_aluno_idCurso` (`idCurso`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curso_idInstituicao` (`idInstituicao`);

--
-- Indexes for table `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dia_idAluno` (`idAluno`);

--
-- Indexes for table `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dia`
--
ALTER TABLE `dia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints
--
ALTER TABLE `aluno` ADD CONSTRAINT `fk_aluno_idCurso` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`);
ALTER TABLE `curso` ADD CONSTRAINT `fk_curso_idInstituicao` FOREIGN KEY (`idInstituicao`) REFERENCES `instituicao` (`id`);
ALTER TABLE `dia` ADD CONSTRAINT `fk_dia_idAluno` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`);