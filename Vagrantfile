# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  
    config.vm.define "web server" do |cfg|
      cfg.vm.box = "ubuntu/focal64"
      cfg.vm.hostname = "vm1"
      cfg.vm.boot_timeout = 1200
      cfg.vm.network :private_network, ip: "10.0.2.3", gateway: "10.0.2.1", type: "dchp"
      cfg.vm.provision "shell", path: "vm1/config.sh", privileged: true
      cfg.vm.provider "virtualbox" do |vb, override|
        vb.gui = true
        vb.name = "web server"
        vb.customize ["modifyvm", :id, "--memory", 4096]
        vb.customize ["modifyvm", :id, "--cpus", 2]
        vb.customize ["modifyvm", :id, "--vram", "32"]
        vb.customize ["modifyvm", :id, "--nicpromisc2", "allow-all"]
        vb.customize ["modifyvm", :id, "--clipboard", "bidirectional"]
        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        vb.customize ["setextradata", "global", "GUI/SuppressMessages", "all" ]
        vb.customize ["modifyvm", :id, "--nat-network3", "NatNetwork"]
      end
    end
  
    config.vm.define "database server" do |cfg|
      cfg.vm.box = "ubuntu/focal64"
      cfg.vm.hostname = "vm2"
      cfg.vm.boot_timeout = 1200
      cfg.vm.network :private_network, ip: "10.0.2.4", gateway: "10.0.2.1", type: "dchp"
      cfg.vm.provision "shell", path: "vm2/config.sh", privileged: true
  
      cfg.vm.provider "virtualbox" do |vb, override|
        vb.gui = true
        vb.name = "database server"
        vb.customize ["modifyvm", :id, "--memory", 2048]
        vb.customize ["modifyvm", :id, "--cpus", 2]
        vb.customize ["modifyvm", :id, "--vram", "32"]
        vb.customize ["modifyvm", :id, "--nicpromisc2", "allow-all"]
        vb.customize ["modifyvm", :id, "--clipboard", "bidirectional"]
        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        vb.customize ["setextradata", "global", "GUI/SuppressMessages", "all" ]
        vb.customize ["modifyvm", :id, "--nat-network3", "NatNetwork"]
      end
    end
  end
  