<?php

use Illuminate\Database\Seeder;

use App\Models\Codigos;


class CodigosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Codigos::create([
            "codigo" => "1.0.0.0.00.0.0.00.00.00", 
            "especificacao" => "Receitas Correntes"
        ]);

        Codigos::create([
            "codigo" => "1.1.0.0.00.0.0.00.00.00", 
            "especificacao" => "Impostos, taxas e contribuções de melhoria"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.0.00.0.0.00.00.00", 
            "especificacao" => "Impostos"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.3.00.0.0.00.00.00", 
            "especificacao" => "Imposto Renda Prov. de Qualquer Natureza"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.3.03.0.0.00.00.00", 
            "especificacao" => "Imposto sobre a Renda - Retido na Fonte"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.3.03.1.0.00.00.00", 
            "especificacao" => "Imposto sobre a Renda - Retido na Fonte - Trabalho"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.3.03.1.1.00.00.00", 
            "especificacao" => "Imposto sobre a Renda - Retido na Fonte - Trabalho - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.3.03.4.0.00.00.00", 
            "especificacao" => "Imposto sobre a Renda Retido na Fonte Outros Rendimentos"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.3.03.4.1.00.00.00", 
            "especificacao" => "Imposto sobre a Renda Retido na Fonte Outros Rendimentos - Princ."
        ]);
        
        Codigos::create([
            "codigo" => "1.1.1.8.00.0.0.00.00.00", 
            "especificacao" => "Impostos Específicos de Estados/DF Municípios"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.8.01.0.0.00.00.00", 
            "especificacao" => "Impostos sobre o Patrimônio para Estados/DF/Municípios"
        ]);

        Codigos::create([
            "codigo" => "1.1.1.8.01.1.0.00.00.00", 
            "especificacao" => "Imposto sobre a Propriedade Predial e Territorial Urban
        a"])
        ;
        Codigos::create([
            "codigo" => "1.1.1.8.01.1.1.00.00.00", 
            "especificacao" => "Imposto sobre a Propriedade Predial e Territorial Urban
        a"])
        ;
        Codigos::create([
            "codigo" => "1.1.1.8.01.1.2.00.00.00", 
            "especificacao" => "Imposto sobre a Propriedade Predial e Territorial Urban
        a"])
        ;
        Codigos::create([
            "codigo" => "1.1.1.8.01.1.3.00.00.00", 
            "especificacao" => "Imposto sobre a Propriedade Predial e Territorial Urban
        a"])
        ;
        Codigos::create([
            "codigo" => "1.1.1.8.01.1.4.00.00.00", 
            "especificacao" => "Imposto sobre a Propriedade Predial e Territorial Urban
        a"])
        ;
        Codigos::create([
            "codigo" => "1.1.1.8.01.4.0.00.00.00", 
            "especificacao" => "Imposto Transmissão Inter Vivos Bens Imóveis e Direitos
        "]);

        Codigos::create([
            "codigo" => "1.1.1.8.01.4.1.00.00.00", 
            "especificacao" => "Imposto Transmissão Inter Vivos Bens Imóveis e Direitos
         -) 
         Princ."];
        Codigos::create([
            "codigo" => "1.1.1.8.02.0.0.00.00.00", 
            "especificacao" => "Impostos s/ Produção, circulação de Mercadorias
         e S
         erviços ")];
        Codigos::create([
            "codigo" => "1.1.1.8.02.3.0.00.00.00", 
            "especificacao" => "Imposto sobre Serviços de Qualquer Natureza "
        ]);

        Codigos::create([
            "codigo" => "1.1.1.8.02.3.1.00.00.00", 
            "especificacao" => "Imposto sobre Serviços de Qualquer Natureza - Principal
        "]);

        Codigos::create([
            "codigo" => "1.1.1.8.02.3.2.00.00.00", 
            "especificacao" => "Imposto sobre Serviços de Qualquer Natureza - Multa
         e j
         ur."]);
        Codigos::create([
            "codigo" => "1.1.1.8.02.3.3.00.00.00", 
            "especificacao" => "Imposto sobre Serviços de Qualquer Natureza - Dívi
        da a
        tiva"]);
        Codigos::create([
            "codigo" => "1.1.1.8.02.3.4.00.00.00", 
            "especificacao" => "Imposto sobre Serviços de Qualquer Natureza"
        ]);

        Codigos::create([
            "codigo" => "1.1.2.0.00.0.0.00.00.00", 
            "especificacao" => "Taxas"
        ]);

        Codigos::create([
            "codigo" => "1.1.2.2.00.0.0.00.00.00", 
            "especificacao" => "Taxas pela Prestação de Serviços"
        ]);

        Codigos::create([
            "codigo" => "1.1.2.2.01.0.0.00.00.00", 
            "especificacao" => "Taxas pela Prestação de Serviços"
        ]);

        Codigos::create([
            "codigo" => "1.1.2.2.01.1.0.00.00.00", 
            "especificacao" => "Taxas pela Prestação de Serviços"
        ]);

        Codigos::create([
            "codigo" => "1.1.2.2.01.1.1.00.00.00", 
            "especificacao" => "Taxas pela Prestação de Serviços - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.1.3.0.00.0.0.00.00.00", 
            "especificacao" => "Contribuições de Melhoria"
        ]);

        Codigos::create([
            "codigo" => "1.1.3.8.00.0.0.00.00.00", 
            "especificacao" => "Contribuição de Melhoria - Específica E/M"
        ]);

        Codigos::create([
            "codigo" => "1.1.3.8.02.0.0.00.00.00", 
            "especificacao" => "Contribuição de Melhoria para Expansão Rede de Iluminaç
        ão "
        ]);
        Codigos::create([
            "codigo" => "1.1.3.8.02.1.0.00.00.00", 
            "especificacao" => "Contribuição de Melhoria Expansão Rede Iluminação Urba
        na "
        ]);
        Codigos::create([
            "codigo" => "1.1.3.8.02.1.1.00.00.00", 
            "especificacao" => "Contribuição de Melhoria Expansão Rede Iluminação Urba
        na -
        ) Princ."];
        Codigos::create([
            "codigo" => "1.3.0.0.00.0.0.00.00.00", 
            "especificacao" => "Receita Patrimonial"
        ]);

        Codigos::create([
            "codigo" => "1.3.1.0.00.0.0.00.00.00", 
            "especificacao" => "Exploração do Patrimônio Imobiliário do Estado "
        ]);

        Codigos::create([
            "codigo" => "1.3.1.0.99.0.0.00.00.00", 
            "especificacao" => "Outras Receitas Imobiliárias"
        ]);

        Codigos::create([
            "codigo" => "1.3.1.0.99.1.0.00.00.00", 
            "especificacao" => "Outras Receitas Imobiliárias"
        ]);

        Codigos::create([
            "codigo" => "1.3.1.0.99.1.1.00.00.00", 
            "especificacao" => "Outras Receitas Imobiliárias - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.0.00.0.0.00.00.00", 
            "especificacao" => "Valores Mobiliários"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.0.0.00.00.00", 
            "especificacao" => "Juros e Correções Monetárias"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.0.00.00.00", 
            "especificacao" => "Remuneração de Depósitos Bancários "
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.00.00.00", 
            "especificacao" => "Remuneração de Depósitos Bancários - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.00.00", 
            "especificacao" => "Remuneração de Depósitos de Recursos Vinculados
         - P
         rincipal")];
        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.15.00", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. FUNDEB - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.20.00", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. - SUS - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.25.00", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. - FNDE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.25.10", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. - PDDE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.25.20", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. - PNAE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.25.30", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. - PNATE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.25.40", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc - Salário edu - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.25.90", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. - outros FNDE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.30.00", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. - FNAS - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.10.53.00", 
            "especificacao" => "Rem. Dep. Banc. Rec. Vinc. - CIDE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.3.2.1.00.1.1.20.00.00", 
            "especificacao" => "Rem. de Dep.Banc.de Recur. Não Vinculados - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.6.0.0.00.0.0.00.00.00", 
            "especificacao" => "Receita de Serviços              "
        ]);

        Codigos::create([
            "codigo" => "1.6.1.0.00.0.0.00.00.00", 
            "especificacao" => "Serviços Administrativos e Comerciais Gerais "
        ]);

        Codigos::create([
            "codigo" => "1.6.1.0.03.0.0.00.00.00", 
            "especificacao" => "Serviços de Registro, Certificação e Fiscalização "
        ]);

        Codigos::create([
            "codigo" => "1.6.1.0.03.1.0.00.00.00", 
            "especificacao" => "Serviços de Registro, Certificação e Fiscalização "
        ]);

        Codigos::create([
            "codigo" => "1.6.1.0.03.1.1.00.00.00", 
            "especificacao" => "Serviços de Registro, Certificação e Fiscalização"
        ]);

        Codigos::create([
            "codigo" => "1.7.0.0.00.0.0.00.00.00", 
            "especificacao" => "Transferências Correntes"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.0.00.0.0.00.00.00", 
            "especificacao" => "Transferências da União e de suas Entidades "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.00.0.0.00.00.00", 
            "especificacao" => "Transferências da União - Específica E/M "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.0.0.00.00.00", 
            "especificacao" => "Participação na Receita da União"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.2.0.00.00.00", 
            "especificacao" => "Cota Parte do FPM - Cota Mensal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.2.1.00.00.00", 
            "especificacao" => "Cota Parte do FPM - Cota Mensal Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.3.0.00.00.00", 
            "especificacao" => "Cota Parte do FPM 1% Cota dezembro "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.3.1.00.00.00", 
            "especificacao" => "Cota Parte do FPM 1% Cota dezembro - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.4.0.00.00.00", 
            "especificacao" => "Cota  Parte do FPM 1% Cota julho "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.4.1.00.00.00", 
            "especificacao" => "Cota  Parte do FPM 1% Cota julho - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.5.0.00.00.00", 
            "especificacao" => "Cota Parte do Imposto Propriedade Territorial Rural "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.01.5.1.00.00.00", 
            "especificacao" => "Cota Parte do Imposto Propriedade Territorial Rural 
        -) P
        rinc."];
        Codigos::create([
            "codigo" => "1.7.1.8.02.0.0.00.00.00", 
            "especificacao" => "Transf. da Compensação Financ. Exploração de Re
        c. N
        aturais"]);
        Codigos::create([
            "codigo" => "1.7.1.8.02.2.0.00.00.00", 
            "especificacao" => "Cota Parte Compensação Financeira Recursos Minerais CFE
        M"])
        ;
        Codigos::create([
            "codigo" => "1.7.1.8.02.2.1.00.00.00", 
            "especificacao" => "Cota Parte Compensação Financeira Recursos Minerais CF
        EM -
        ) Princ."];
        Codigos::create([
            "codigo" => "1.7.1.8.02.3.0.00.00.00", 
            "especificacao" => "Cota Parte Royalties Compen.Produç.Petro Lei"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.02.3.1.00.00.00", 
            "especificacao" => "Cota Parte Royalties Compen.Produç.Petro Lei"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.02.4.0.00.00.00", 
            "especificacao" => "Cota Parte Royalties Exc. Prod.Petróleo Lei 9.478/97 "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.02.4.1.00.00.00", 
            "especificacao" => "Cota Parte Royalties Exc. Prod.Petróleo Lei 9.478/97"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.02.6.0.00.00.00", 
            "especificacao" => "Cota Parte do Fundo Especial do Petróleo - FEP"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.02.6.1.00.00.00", 
            "especificacao" => "Cota Parte do Fundo Especial do  Petróleo - FEP
         - P
         rincipal")];
        Codigos::create([
            "codigo" => "1.7.1.8.03.0.0.00.00.00", 
            "especificacao" => "Transferência de Recursos do SUS Bloco Custeio "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.1.0.00.00.00", 
            "especificacao" => "Transferência de Recursos do SUS - Atenção Básica "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.1.1.00.00.00", 
            "especificacao" => "Transferência de Recursos do SUS - Atenção Básica 
        -) P
        rincipal "];
        Codigos::create([
            "codigo" => "1.7.1.8.03.1.1.30.00.00", 
            "especificacao" => "Piso de Atenção Básica Variável (PAB Variável)
         - P
         rincipal ")];
        Codigos::create([
            "codigo" => "1.7.1.8.03.1.1.30.05.00", 
            "especificacao" => "Saúde da Família - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.1.1.30.10.00", 
            "especificacao" => "Agentes Comunitários de Saúde - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.1.1.30.15.00", 
            "especificacao" => "Saúde Bucal - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.1.1.90.00.00", 
            "especificacao" => "Outros Programas Fin. por Transf Fundo a Fundo
         - P
         rincipal"]);
        Codigos::create([
            "codigo" => "1.7.1.8.03.2.0.00.00.00", 
            "especificacao" => "Transferência de Recursos do SUS MAC Amb. Hosp"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.2.1.00.00.00", 
            "especificacao" => "Transferência de Recursos do SUS MAC Amb. Hosp
         - P
         rincipal ")];
        Codigos::create([
            "codigo" => "1.7.1.8.03.2.1.10.00.00", 
            "especificacao" => "Limite Financeiro da MAC Ambulatorial e Hospitalar  "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.2.1.10.07.00", 
            "especificacao" => "Atenção de Média e Alta Complexidade - Teto Financeiro"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.3.0.00.00.00", 
            "especificacao" => "Transferência de Recursos do SUS - Vigilância em Saúde"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.03.3.1.00.00.00", 
            "especificacao" => "Transferência de Recursos do SUS - Vigilância em Saúde 
        -) P
        rinc."];
        Codigos::create([
            "codigo" => "1.7.1.8.03.3.1.10.00.00", 
            "especificacao" => "Vigilância Epidemiológica e Ambiental em Saúde
         - P
         rincipal"]);
        Codigos::create([
            "codigo" => "1.7.1.8.04.0.0.00.00.00", 
            "especificacao" => "Transferência do SUS - Bloco Investimento Rede "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.04.1.0.00.00.00", 
            "especificacao" => "Transferências do SUS - Atenção Básica "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.04.1.1.00.00.00", 
            "especificacao" => "Transferências do SUS - Atenção Básica - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.0.0.00.00.00", 
            "especificacao" => "Transferência de Rec.Fundo Nac. de Desenv. Educação. FN
        DE "
        ]);
        Codigos::create([
            "codigo" => "1.7.1.8.05.1.0.00.00.00", 
            "especificacao" => "Transferências do Salário Educação "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.1.1.00.00.00", 
            "especificacao" => "Transferências do Salário Educação - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.2.0.00.00.00", 
            "especificacao" => "Transfer. Diretas do FNDE - PDDE"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.2.1.00.00.00", 
            "especificacao" => "Transfer. Diretas do FNDE - PDDE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.3.0.00.00.00", 
            "especificacao" => "Transfer. Direta do FNDE PNAE"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.3.1.00.00.00", 
            "especificacao" => "Transfer. Direta do FNDE PNAE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.4.0.00.00.00", 
            "especificacao" => "Tran.Dir.FNDE Ref.ao PNATE"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.4.1.00.00.00", 
            "especificacao" => "Tran.Dir.FNDE Ref.ao PNATE - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.05.9.0.00.00.00", 
            "especificacao" => "Outras Transf. Dir. Fund. Nacio. Desenvol Educação FNDE
         "])
         ;
        Codigos::create([
            "codigo" => "1.7.1.8.05.9.1.00.00.00", 
            "especificacao" => "Outras Transf. Dir. Fund. Nacio. Desenvol Educação FNDE
         -) 
         Princ. "];
        Codigos::create([
            "codigo" => "1.7.1.8.05.9.1.90.00.00", 
            "especificacao" => "Outras Transf Dir do Fundo Nac Des  Educação - FNDE 
        -) P
        rinc."];
        Codigos::create([
            "codigo" => "1.7.1.8.06.0.0.00.00.00", 
            "especificacao" => "Transferência Fin ICMS - Desoneração - Lc. Nº 87/96 "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.06.1.0.00.00.00", 
            "especificacao" => "Transferência Financeira ICMS Desoneração Lc. Nº 87/96 
        "]);

        Codigos::create([
            "codigo" => "1.7.1.8.06.1.1.00.00.00", 
            "especificacao" => "Transferência Financeira ICMS Desoneração Lc. Nº 87/96"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.09.0.0.00.00.00", 
            "especificacao" => "Transferências de Recursos de Complementação da União a
        o) F
        UNDEB"];
        Codigos::create([
            "codigo" => "1.7.1.8.09.1.0.00.00.00", 
            "especificacao" => "Transferências de Complementação da União ao FUNDEB"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.09.1.1.00.00.00", 
            "especificacao" => "Transferências de Complementação da União ao FUNDEB 
        -) P
        rinc."];
        Codigos::create([
            "codigo" => "1.7.1.8.10.0.0.00.00.00", 
            "especificacao" => "Transferências de Convênios com a União e de Su
        as E
        ntidades")];
        Codigos::create([
            "codigo" => "1.7.1.8.10.1.0.00.00.00", 
            "especificacao" => "Transf. Convênios da União p/ o Sist.Único de Saúde SUS
        "]);

        Codigos::create([
            "codigo" => "1.7.1.8.10.1.1.00.00.00", 
            "especificacao" => "Transf. Convênios da União p/ o Sist.Único de Saúde SUS
         -) 
         Princ."];
        Codigos::create([
            "codigo" => "1.7.1.8.10.2.0.00.00.00", 
            "especificacao" => "Transf. Convênios União Destinadas Programa de Educação
        "]);

        Codigos::create([
            "codigo" => "1.7.1.8.10.2.1.00.00.00", 
            "especificacao" => "Transf. Convênios União Destinadas Programa de Educação
        "]);

        Codigos::create([
            "codigo" => "1.7.1.8.10.3.0.00.00.00", 
            "especificacao" => "Transf.de Convênios União Dest. a Prog Assist. Social "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.10.3.1.00.00.00", 
            "especificacao" => "Transf.de Convênios União Dest. a Prog Assist. Social 
        -) P
        rinc."];
        Codigos::create([
            "codigo" => "1.7.1.8.10.9.0.00.00.00", 
            "especificacao" => "Outras Transferências de Convênios da União"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.10.9.1.00.00.00", 
            "especificacao" => "Outras Transferências de Convênios da União - Principal
        "]);

        Codigos::create([
            "codigo" => "1.7.1.8.12.0.0.00.00.00", 
            "especificacao" => "Transferências de Recursos do FNAS "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.12.1.0.00.00.00", 
            "especificacao" => "Transferências de Recursos do FNAS "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.12.1.1.00.00.00", 
            "especificacao" => "Transferências de Recursos do FNAS - Principal "
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.12.1.1.10.00.00", 
            "especificacao" => "Proteção Social Básica - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.12.1.1.20.00.00", 
            "especificacao" => "Gestão do SUAS - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.12.1.1.30.00.00", 
            "especificacao" => "Proteção Social Especial de Média  Complexidade
         - P
         rincipal")];
        Codigos::create([
            "codigo" => "1.7.1.8.12.1.1.50.00.00", 
            "especificacao" => "Gestão do Prog. Bolsa Família e do Cadastro Único 
        -) P
        rincipal"];
        Codigos::create([
            "codigo" => "1.7.1.8.99.0.0.00.00.00", 
            "especificacao" => "Demais Transferências da União"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.99.1.0.00.00.00", 
            "especificacao" => "Outras Transferências da União"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.99.1.1.00.00.00", 
            "especificacao" => "Outras Transferências da União"
        ]);

        Codigos::create([
            "codigo" => "1.7.1.8.99.1.1.90.00.00", 
            "especificacao" => "Outras Transferências da União - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.0.00.0.0.00.00.00", 
            "especificacao" => "Transferências dos Estados"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.00.0.0.00.00.00", 
            "especificacao" => "Transferências da União - Específica E/M"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.0.0.00.00.00", 
            "especificacao" => "Participação na Receita dos Estados"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.1.0.00.00.00", 
            "especificacao" => "Cota Parte do ICMS"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.1.1.00.00.00", 
            "especificacao" => "Cota Parte do ICMS - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.2.0.00.00.00", 
            "especificacao" => "Cota Parte do IPVA"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.2.1.00.00.00", 
            "especificacao" => "Cota Parte do IPVA - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.3.0.00.00.00", 
            "especificacao" => "Cota Parte do IPI - Municípios"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.3.1.00.00.00", 
            "especificacao" => "Cota Parte do IPI - Municípios - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.4.0.00.00.00", 
            "especificacao" => "Cota Parte Contribuição Intervenção Domínio Econômico"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.01.4.1.00.00.00", 
            "especificacao" => "Cota Parte Contribuição Intervenção Domínio Econômico"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.10.0.0.00.00.00", 
            "especificacao" => "Transferências de Convênios Estados/Dist.Federal e"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.10.2.0.00.00.00", 
            "especificacao" => "Transf. Convênio dos Estados Dest. a Programas Educação
         "])
         ;
        Codigos::create([
            "codigo" => "1.7.2.8.10.2.1.00.00.00", 
            "especificacao" => "Transf. Convênio dos Estados Dest. a Programas Educação
        "]);

        Codigos::create([
            "codigo" => "1.7.2.8.10.9.0.00.00.00", 
            "especificacao" => "Outras Transferências de Convênio dos Estados"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.10.9.1.00.00.00", 
            "especificacao" => "Outras Transferências de Convênio dos Estados
         - P
         rincipal"]);
        Codigos::create([
            "codigo" => "1.7.2.8.10.9.1.30.00.00", 
            "especificacao" => "Transf. Convênio Estad Prog. Assistência Social
         - P
         rincipal")];
        Codigos::create([
            "codigo" => "1.7.2.8.99.0.0.00.00.00", 
            "especificacao" => "Demais Transferências do Estado"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.99.1.0.00.00.00", 
            "especificacao" => "Outras Transferências dos Estados"
        ]);

        Codigos::create([
            "codigo" => "1.7.2.8.99.1.1.00.00.00", 
            "especificacao" => "Outras Transferências dos Estados - Principal       "
        ]);

        Codigos::create([
            "codigo" => "1.7.5.0.00.0.0.00.00.00", 
            "especificacao" => "Transferências de Outras Instituições Públicas "
        ]);

        Codigos::create([
            "codigo" => "1.7.5.8.00.0.0.00.00.00", 
            "especificacao" => "Transferências de Outras Instituições Públicas  "
        ]);

        Codigos::create([
            "codigo" => "1.7.5.8.01.0.0.00.00.00", 
            "especificacao" => "Transf.Recur.do Fundo de Man.Desenv. da Educação Básic
        a  "
        ]);
        Codigos::create([
            "codigo" => "1.7.5.8.01.1.0.00.00.00", 
            "especificacao" => "Transferências de Recursos do FUNDEB "
        ]);

        Codigos::create([
            "codigo" => "1.7.5.8.01.1.1.00.00.00", 
            "especificacao" => "Transferências de Recursos do"
        ]);

        Codigos::create([
            "codigo" => "1.9.0.0.00.0.0.00.00.00", 
            "especificacao" => "Outras Receitas Correntes"
        ]);

        Codigos::create([
            "codigo" => "1.9.2.0.00.0.0.00.00.00", 
            "especificacao" => "Indenizações, Restituições e Ressarcimentos"
        ]);

        Codigos::create([
            "codigo" => "1.9.2.2.00.0.0.00.00.00", 
            "especificacao" => "Restituições"
        ]);

        Codigos::create([
            "codigo" => "1.9.2.2.99.0.0.00.00.00", 
            "especificacao" => "Outras Restituições"
        ]);

        Codigos::create([
            "codigo" => "1.9.2.2.99.1.0.00.00.00", 
            "especificacao" => "Outras Restituições"
        ]);

        Codigos::create([
            "codigo" => "1.9.2.2.99.1.1.00.00.00", 
            "especificacao" => "Outras Restituições - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.9.9.0.00.0.0.00.00.00", 
            "especificacao" => "Demais Receitas Correntes"
        ]);

        Codigos::create([
            "codigo" => "1.9.9.0.99.0.0.00.00.00", 
            "especificacao" => "Outras Receitas"
        ]);

        Codigos::create([
            "codigo" => "1.9.9.0.99.1.0.00.00.00", 
            "especificacao" => "Outras Receitas - Primárias"
        ]);

        Codigos::create([
            "codigo" => "1.9.9.0.99.1.1.00.00.00", 
            "especificacao" => "Outras Receitas - Primárias - Principal"
        ]);

        Codigos::create([
            "codigo" => "1.9.9.0.99.1.3.00.00.00", 
            "especificacao" => "Outras Receitas - Primárias - Dívida ativa"
        ]);

        Codigos::create([
            "codigo" => "2.0.0.0.00.0.0.00.00.00", 
            "especificacao" => "Receitas de Capital"
        ]);

        Codigos::create([
            "codigo" => "2.4.0.0.00.0.0.00.00.00", 
            "especificacao" => "Transferências de Capital"
        ]);

        Codigos::create([
            "codigo" => "2.4.1.0.00.0.0.00.00.00", 
            "especificacao" => "Transferências da União e de suas Entidades "
        ]);

        Codigos::create([
            "codigo" => "2.4.1.8.00.0.0.00.00.00", 
            "especificacao" => "Transferências da União"
        ]);

        Codigos::create([
            "codigo" => "2.4.1.8.04.0.0.00.00.00", 
            "especificacao" => "Transferências do Sistema Único de Saúde - SUS - Bloc
        o) I
        nvestimen "];
        Codigos::create([
            "codigo" => "2.4.1.8.04.6.0.00.00.00", 
            "especificacao" => "Outras Transferências do Sistema Único de Saúde - SUS "
        ]);

        Codigos::create([
            "codigo" => "2.4.1.8.04.6.1.00.00.00", 
            "especificacao" => "Outras Transferências do Sistema Único de Saúde - SUS 
        -) P
        rinc."];
        Codigos::create([
            "codigo" => "2.4.1.8.10.0.0.00.00.00", 
            "especificacao" => "Transferência de Convênios da    União e de su
        as E
        ntidades"]);
        Codigos::create([
            "codigo" => "2.4.1.8.10.2.0.00.00.00", 
            "especificacao" => "Transferência Convênio União Destinadas Prog.de Educaçã
        o"])
        ;
        Codigos::create([
            "codigo" => "2.4.1.8.10.2.1.00.00.00", 
            "especificacao" => "Transferência Convênio União Destinadas Prog.de Educaçã
        o"])
        ;
        Codigos::create([
            "codigo" => "2.4.1.8.99.0.0.00.00.00", 
            "especificacao" => "Outras Transferências da União"
        ]);

        Codigos::create([
            "codigo" => "2.4.1.8.99.1.0.00.00.00", 
            "especificacao" => "Outras Transferências da União"
        ]);

        Codigos::create([
            "codigo" => "2.4.1.8.99.1.1.00.00.00", 
            "especificacao" => "Outras Transferências da União"
        ]);

        Codigos::create([
            "codigo" => "2.4.1.8.99.1.1.90.00.00", 
            "especificacao" => "Outras Transferências da União"
        ]);

        Codigos::create([
            "codigo" => "900.0.0.0.00.0.0.00.00.00"
            , "especificacao" => "Deduções de Receita"
        ]);

        Codigos::create([
            "codigo" => "950.0.0.0.00.0.0.00.00.00"
            , "especificacao" => "Deduções do FUNDEB"
        ]);

        Codigos::create([
            "codigo" => "951.0.0.0.00.0.0.00.00.00"
            , "especificacao" => "Receitas Correntes"
        ]);

        Codigos::create([
            "codigo" => "951.7.0.0.00.0.0.00.00.00"
            , "especificacao" => "Transferências Correntes"
        ]);

        Codigos::create([
            "codigo" => "951.7.1.0.00.0.0.00.00.00"
            , "especificacao" => "Transferências da União e de suas Entidades "
        ]);

        Codigos::create([
            "codigo" => "951.7.1.8.00.0.0.00.00.00"
            , "especificacao" => "Transferências da União - Específica E/M "
        ]);

        Codigos::create([
            "codigo" => "951.7.1.8.01.0.0.00.00.00"
            , "especificacao" => "Participação na Receita da União"
        ]);

        Codigos::create([
            "codigo" => "951.7.1.8.01.2.0.00.00.00"
            , "especificacao" => "Cota Parte do FPM - Cota Mensal"
        ]);

        Codigos::create([
            "codigo" => "951.7.1.8.01.2.1.00.00.00"
            , "especificacao" => "Cota Parte do FPM - Cota Mensal Principal"
        ]);

        Codigos::create([
            "codigo" => "951.7.1.8.01.5.0.00.00.00"
            , "especificacao" => "Cota Parte do Imposto Propriedade Territorial Rural"
        ]);

        Codigos::create([
            "codigo" => "951.7.1.8.01.5.1.00.00.00"
            , "especificacao" => "Cota Parte do Imposto Propriedade Territorial Rural 
        -) P
        rinc."];
        Codigos::create([
            "codigo" => "951.7.1.8.06.0.0.00.00.00"
            , "especificacao" => "Transferência Fin ICMS - Desoneração - Lc. Nº 87/96"
        ]);

        Codigos::create([
            "codigo" => "951.7.1.8.06.1.0.00.00.00"
            , "especificacao" => "Transferência Financeira ICMS Desoneração Lc. Nº 87/9
        6"])
        ;
        Codigos::create([
            "codigo" => "951.7.1.8.06.1.1.00.00.00"
            , "especificacao" => "Transferência Financeira ICMS Desoneração Lc. Nº 87/9
        6"])
        ;
        Codigos::create([
            "codigo" => "951.7.2.0.00.0.0.00.00.00"
            , "especificacao" => "Transferências dos Estados"
        ]);

        Codigos::create([
            "codigo" => "951.7.2.8.00.0.0.00.00.00"
            , "especificacao" => "Transferências da União - Específica E/M "
        ]);

        Codigos::create([
            "codigo" => "951.7.2.8.01.0.0.00.00.00"
            , "especificacao" => "Participação na Receita dos Estados "
        ]);

        Codigos::create([
            "codigo" => "951.7.2.8.01.1.0.00.00.00"
            , "especificacao" => "Cota Parte do ICMS"
        ]);

        Codigos::create([
            "codigo" => "951.7.2.8.01.1.1.00.00.00"
            , "especificacao" => "Cota Parte do ICMS - Principal"
        ]);

        Codigos::create([
            "codigo" => "951.7.2.8.01.2.0.00.00.00"
            , "especificacao" => "Cota Parte do IPVA"
        ]);

        Codigos::create([
            "codigo" => "951.7.2.8.01.2.1.00.00.00"
            , "especificacao" => "Cota Parte do IPVA - Principal"
        ]);

        Codigos::create([
            "codigo" => "951.7.2.8.01.3.0.00.00.00"
            , "especificacao" => "Cota Parte do IPI - Municípios   "
        ]);

        Codigos::create([
            "codigo" => "951.7.2.8.01.3.1.00.00.00"
            , "especificacao" => "Cota Parte do IPI - Municípios"
        ]);

    }
}
