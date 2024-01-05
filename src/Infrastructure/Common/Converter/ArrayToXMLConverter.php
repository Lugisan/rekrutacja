<?php

declare(strict_types=1);

namespace Infrastructure\Common\Converter;

use App\Common\Converter\ArrayToXmlConverterInterface;

final class ArrayToXMLConverter implements ArrayToXmlConverterInterface
{
    public function convert(
        array $data
    ): string {
        $result = '';

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $result .= '<' . $key . '>';
                $result .= $this->convert($value);
                $result .= '</' . $key . '>';
            } else {
                $result .= '<' . $key . '><![CDATA[' .
                    preg_replace(
                        '/[\x00-\x08\x0B\x0C\x0E-\x1F]|\xED[\xA0-\xBF].|\xEF\xBF[\xBE\xBF]/',
                        "\xEF\xBF\xBD",
                        $value
                    )
                    .']]></' . $key . '>';
            }
        }

        return $result;
    }

    public function convertUser(
        array $data
    ): string {
        $result = '';
        foreach ($data as $key => $item) {
            if ('permissions' === $key) {
                foreach ($item as $permission) {
                    $result .= '<' . $key . '>';
                    foreach ($permission as $element) {
                        $result .= $this->convert(['permission' => $element]);
                    }
                    $result .= '</' . $key . '>';
                }
            } else {
                $result .= $this->convert([$key => $item]);
            }
        }

        return $result;
    }
}
