<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


namespace Eccube\Form\Type\Front;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'name', array(
                'required' => true,
            ))
            ->add('kana', 'kana', array(
                'required' => false,
            ))
            ->add('zip', 'zip', array(
                'required' => false,
            ))
            ->add('address', 'address', array(
                'required' => false,
            ))
            ->add('tel', 'tel', array(
                'required' => false,
            ))
            ->add('email', 'email', array(
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Email(array('strict' => true)),
                ),
            ))
            ->add('contents', 'textarea', array(
                'help' => 'form.contact.contents.help',
                'constraints' => array(
                    new Assert\NotBlank(),
                ),
            ))
            ->add('store', 'choice', array(
				'label'     => '特定の店舗にお問い合わせご希望',
                'choices'   => array(
                    '渋谷本店' => '渋谷本店',
                    '銀座店' => '銀座店',
                    '池袋店' => '池袋店',
                    '横浜店' => '横浜店',
					'指定なし' => '指定なし'
                ),
                'required'  => false,
                'placeholder' => false,
            ))
            ->add('reply', 'choice', array(
                'label'     => '返信の方法',
                'choices'   => array(
                    '' => '返信の方法を選択してください',
                    'メール' => 'メール',
                    '電話' => '電話'
                ),
                'required'  => false,
                'placeholder' => false,
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'contact';
    }
}
