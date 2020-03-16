<?php

namespace Futureecom\OmnipayTranzila;

use Futureecom\OmnipayTranzila\Message\AuthorizeRequest;
use Futureecom\OmnipayTranzila\Message\CaptureRequest;
use Futureecom\OmnipayTranzila\Message\PurchaseRequest;
use Futureecom\OmnipayTranzila\Message\RefundRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class TranzilaGateway
 *
 * @noinspection PhpHierarchyChecksInspection
 */
class TranzilaGateway extends AbstractGateway
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'tranzila';
    }

    /**
     * @inheritDoc
     */
    public function getDefaultParameters()
    {
        return [
            'supplier' => $this->getSupplier(),
        ];
    }

    /**
     * @return string|null
     */
    public function getSupplier(): ?string
    {
        return $this->getParameter('supplier');
    }

    /**
     * @inheritDoc
     */
    public function authorize(array $options = []): RequestInterface
    {
        return $this->createRequest(AuthorizeRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function capture(array $options = []): RequestInterface
    {
        return $this->createRequest(CaptureRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function purchase(array $options = []): RequestInterface
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function refund(array $options = []): RequestInterface
    {
        return $this->createRequest(RefundRequest::class, $options);
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setSupplier(?string $value): self
    {
        return $this->setParameter('supplier', $value);
    }
}
