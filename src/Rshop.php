<?php
namespace Rshop\CS\Config;

use PhpCsFixer\Config;

class Rshop extends Config
{
    /**
     * @var string
     */
    private $header;

    /**
     * @param string $header
     */
    public function __construct($header = null)
    {
        $this->header = $header;

        parent::__construct('rshop');

        $this->setRiskyAllowed(true);
    }

    /**
     * @return array
     */
    public function getRules()
    {
        $rules = [
            '@Symfony' => true,
            'array_syntax' => [
                'syntax' => 'short'
            ],
            'concat_space' => [
                'spacing' => 'one'
            ],
            'hash_to_slash_comment' => false,
            'is_null' => [
                'use_yoda_style' => false
            ],
            'no_blank_lines_before_namespace' => true,
            'no_multiline_whitespace_before_semicolons' => true,
            'no_null_property_initialization' => true,
            'no_php4_constructor' => true,
            'no_useless_return' => true,
            'ordered_class_elements' => [
                'order' => ['use_trait', 'constant_public', 'constant_protected', 'constant_private', 'property_public', 'property_protected', 'property_private', 'construct', 'destruct', 'method_public', 'method_protected', 'method_private', 'magic', 'phpunit']
            ],
            'ordered_imports' => [
                'sortAlgorithm' => 'alpha'
            ],
            'phpdoc_add_missing_param_annotation' => [
                'only_untyped' => false
            ],
            'phpdoc_order' => true,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last'
            ],
            'protected_to_private' => false,
            'single_blank_line_before_namespace' => false,
            'ternary_to_null_coalescing' => true,
            'trailing_comma_in_multiline_array' => false,
            'yoda_style' => [
                'equal' => false,
                'identical' => false,
                'less_and_greater' => false
            ]
        ];

        if ($this->header !== null) {
            $rules['header_comment'] = [
                'header' => $this->header,
            ];
        }

        return $rules;
    }
}
