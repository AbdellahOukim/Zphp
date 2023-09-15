<?php

namespace app\core;


class View
{
    public function render($view, $params = [])
    {
        $rendredView = $this->renderView($view, $params);

        if ($this->hasLayout($rendredView)) {
            $layoutName = $this->getLayoutName($rendredView);
            $viewWithLayout = $this->getLayoutView($layoutName);
            $rendredView = str_replace("{{#useLayout('$layoutName')}}", '', $rendredView);
            return str_replace('{#content}', $rendredView, $viewWithLayout);
        }

        return $rendredView;
    }

    public function renderView($view, $params = [])
    {
        if (str_contains($view, '.')) {
            $view = str_replace('.', '/', $view);
        }

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once "../views/$view.php";
        return ob_get_clean();
    }


    public function hasLayout($view)
    {
        $position = strpos($view, "{#useLayout");
        return $position;
    }


    public function getLayoutName($view)
    {
        $viewCopy = $view;
        $startName = strpos($view, "('");
        $endName = strpos($view, "')");
        $layoutName =  substr($viewCopy, $startName + 2, $endName - ($startName + 2));

        return $layoutName;
    }

    public function getLayoutView($layoutName)
    {
        ob_start();
        include_once "../views/layouts/$layoutName.php";
        return ob_get_clean();
    }
}
