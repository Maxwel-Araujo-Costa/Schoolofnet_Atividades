<?php
echo $this->Form->create();
echo $this->Form->input('name');
echo $this->Form->input('username');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->submit('save');
echo $this->Form->end();
