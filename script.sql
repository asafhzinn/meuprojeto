-- 1. Certifique-se de usar o banco de dados correto (substitua pelo nome do seu banco se for diferente)
-- CREATE DATABASE IF NOT EXISTS gestao_estoque;
-- USE gestao_estoque;

-- 2. Limpa as tabelas na ordem correta caso elas já existam (evita erros de chave estrangeira)
DROP TABLE IF EXISTS movimentacaos;
DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS produtos;
DROP TABLE IF EXISTS users;

-- 3. Criação da tabela de Usuários (Necessária para o Login)
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Criação da tabela de Produtos (Sincronizada com a sua Migration real)
CREATE TABLE produtos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(110) NOT NULL,
    cor VARCHAR(80) NOT NULL,
    textura VARCHAR(120) NOT NULL,
    peso INT NOT NULL,
    quantidade_estoque INT NOT NULL DEFAULT 0,
    faixa_etaria_minima VARCHAR(20) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Criação da tabela de Clientes (Sincronizada com o seu Componente de Clientes)
CREATE TABLE clientes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    identificador VARCHAR(100) NULL,
    cpf VARCHAR(20) NOT NULL UNIQUE,
    telefone VARCHAR(20) NULL,
    cargo VARCHAR(100) NULL,
    idade INT NOT NULL,
    data_nascimento DATE NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Criação da tabela de Movimentações (Com user_id Opcional/Nullable)
CREATE TABLE movimentacaos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quantidade INT NOT NULL,
    data_movimentacao DATE NOT NULL,
    tipo ENUM('entrada', 'saida') NOT NULL,
    produto_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Chaves Estrangeiras (Relacionamentos)
    CONSTRAINT fk_movimentacao_produto FOREIGN KEY (produto_id) REFERENCES  produtos(id) ON DELETE CASCADE,
    CONSTRAINT fk_movimentacao_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Insere o Usuário Administrador Padrão para você conseguir fazer login imediatamente
INSERT INTO users (name, email, password) 
VALUES (
    'Administrador', 
    'admin@admin.com', 
    -- Senha criptografada padrão do Laravel (Equivale a '12345678')
    '$2y$12$clZ8B39Z6kLd2K6.Z8K4.On.6uEqH5/E30x12N88wbyL.uM40u4Tq'
);
