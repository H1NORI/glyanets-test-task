<?php

namespace Drupal\my_first_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class MySimpleForm extends FormBase
{
    public function getFormId(): string
    {
        return 'my_simple_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state): array
    {
        $form['text'] = [
            '#type' => 'textfield',
            '#title' => 'Text',
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'Відправити',
        ];

        if ($result = $form_state->get('result')) {
            $form['result'] = [
                '#markup' => 'Результат: ' . $result,
            ];
        }

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state): void
    {
        $form_state->set('result', $form_state->getValue('text'));
        $form_state->setRebuild();
    }
}