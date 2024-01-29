INSERT INTO usuarios (nome, data_nascimento, sexo, logradouro, numero, setor, cidade, uf) VALUES ('jão', '1/02/2023', 'm', 'av. sei lá', 4, 'jaó', 'goiania', 'go')

select * from usuarios

UPDATE usuarios SET logradouro = :logradouro, numero = :numero, setor = :setor, cidade = :cidade, uf = :uf WHERE id = :id;

SELECT nome, data_nascimento, sexo, logradouro, numero, setor, cidade, uf FROM usuarios WHERE id = :id

DELETE FROM usuarios WHERE id = :id