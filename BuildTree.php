<?php

class BuildTree
{
	/**
	 * Рекурсивное создание дерева элементов
	 *
	 * @param array  $elements Массив элементов
	 * @param string $parentId Идентификатор корневого элемента
	 * @return array
	 */
	public function makeTree(Array &$elements, $parentId = '') : array
	{
		$branch = [];
		foreach ($elements as &$element) {
			if ($element['parentId'] == $parentId) {
				$element['children'] = $this->makeTree($elements, $element['id']);
				$branch[$element['id']] = $element;
				unset($element);
			}
		}
		return $branch;
	}
}