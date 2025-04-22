<?php
namespace Rshop\CS\Config;

use PhpCsFixer\Config;

class Rshop extends Config
{
    private $header;

    private $strict = false;

    private $rules = [
        '@PhpCsFixer' => true,
        'array_syntax' => [
            'syntax' => 'short'
        ],
        'blank_line_before_statement' => [
            'statements' => ['break', 'case', 'continue', 'declare', 'default', 'do', 'for', 'foreach', 'if', 'include', 'include_once', 'require', 'require_once', 'return', 'switch', 'throw', 'try', 'while', 'yield']
        ],
        'concat_space' => [
            'spacing' => 'one'
        ],
        'blank_line_after_opening_tag' => false,
        'single_line_empty_body'=> false,
        'fully_qualified_strict_types' => false,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_type_declaration' => true,
        'echo_tag_syntax' => false,
        'explicit_indirect_variable' => true,
        'is_null' => false,
        'logical_operators' => true,
        'method_chaining_indentation' => true,
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line'
        ],
        'native_function_invocation' => [
            'include' => ['@internal']
        ],
        'no_useless_return' => true,
        'operator_linebreak' => false,
        'ordered_class_elements' => [
            'order' => ['use_trait', 'case', 'constant_public', 'constant_protected', 'constant_private', 'property_public', 'property_protected', 'property_private', 'construct', 'destruct', 'method_public', 'method_protected', 'method_private', 'magic', 'phpunit']
        ],
        'ordered_types' => [
            'null_adjustment' => 'always_last'
        ],
        'phpdoc_order' => true,
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
            'sort_algorithm' => 'none'
        ],
        'php_unit_test_class_requires_covers' => false,
        'php_unit_internal_class' => false,
        'protected_to_private' => false,
        'single_line_comment_style' => false,
        'ternary_to_null_coalescing' => true,
        'trailing_comma_in_multiline' => false,
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false
        ]
    ];

    public function __construct(?string $header = null)
    {
        $this->header = $header;

        parent::__construct('rshop');

        $this->setRiskyAllowed(true);
    }

    public function setRule(string $rule, $value)
    {
        $this->rules[$rule] = $value;

        return $this;
    }

    public function setStrict()
    {
        $this->strict = true;

        return $this;
    }

    public function getRules(): array
    {
        $this->rules['declare_strict_types'] = $this->strict;

        if ($this->header !== null) {
            $this->rules['header_comment'] = [
                'comment_type' => 'PHPDoc',
                'header' => $this->header,
                'location' => 'after_open',
                'separate' => 'none'
            ];
        }

        return $this->rules;
    }
}
